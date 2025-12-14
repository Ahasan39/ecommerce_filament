<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <div class="container mx-auto px-4">
    <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
    <div class="flex flex-col md:flex-row gap-4">
      <!-- Left Column - Cart Items -->
      <div class="md:w-3/4">
        <!-- Mobile View (hidden on md and larger) -->
        <div class="md:hidden space-y-4 mb-4">
          @forelse ($cart_items as $item)
            <div class="bg-white rounded-lg shadow-md p-4" wire:key="{{ $item['product_id'] }}">
              <div class="flex justify-between items-start">
                <div class="flex items-center">
                  <img class="h-16 w-16 mr-4 object-cover" src="{{ url('storage', $item['images']) }}" alt="{{ $item['name'] }}">
                  <div>
                    <span class="font-semibold block">{{ $item['name'] }}</span>
                    <span class="text-sm text-gray-600">{{ Number::currency($item['unit_amount'], 'BDT') }}</span>
                  </div>
                </div>
                <button wire:click='removeItem({{ $item['product_id'] }})' class="text-red-500 hover:text-red-700">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
              
              <div class="flex justify-between items-center mt-4">
                <div class="flex items-center">
                  <button wire:click='decreaseQty({{ $item['product_id'] }})' class="border rounded-md py-1 px-3 mr-2 hover:bg-gray-100">-</button>
                  <span class="text-center w-8">{{ $item['quantity'] }}</span>
                  <button wire:click='increaseQty({{ $item['product_id'] }})' class="border rounded-md py-1 px-3 ml-2 hover:bg-gray-100">+</button>
                </div>
                <span class="font-medium">{{ Number::currency($item['total_amount'], 'BDT') }}</span>
              </div>
            </div>
          @empty
            <div class="bg-white rounded-lg shadow-md p-6 text-center text-xl font-semibold text-slate-500">
              No items available in cart!
            </div>
          @endforelse
        </div>

        <!-- Desktop View (unchanged original table) -->
        <div class="hidden md:block bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
          <table class="w-full">
            <thead>
              <tr>
                <th class="text-left font-semibold">Product</th>
                <th class="text-left font-semibold">Price</th>
                <th class="text-left font-semibold">Quantity</th>
                <th class="text-left font-semibold">Total</th>
                <th class="text-left font-semibold">Remove</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($cart_items as $item)
                <tr wire:key="{{ $item['product_id'] }}">
                  <td class="py-4">
                    <div class="flex items-center">
                      <img class="h-16 w-16 mr-4 object-cover" src="{{ url('storage', $item['images']) }}" alt="{{ $item['name'] }}">
                      <span class="font-semibold">{{ $item['name'] }}</span>
                    </div>
                  </td>
                  <td class="py-4">{{ Number::currency($item['unit_amount'], 'BDT') }}</td>
                  <td class="py-4">
                    <div class="flex items-center">
                      <button wire:click='decreaseQty({{ $item['product_id'] }})' class="border rounded-md py-2 px-4 mr-2 hover:bg-gray-100">-</button>
                      <span class="text-center w-8">{{ $item['quantity'] }}</span>
                      <button wire:click='increaseQty({{ $item['product_id'] }})' class="border rounded-md py-2 px-4 ml-2 hover:bg-gray-100">+</button>
                    </div>
                  </td>
                  <td class="py-4">{{ Number::currency($item['total_amount'], 'BDT') }}</td>
                  <td>
                    <button wire:click='removeItem({{ $item['product_id'] }})' class="bg-slate-300 border-2 border-slate-400 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white hover:border-red-700">
                      <span wire:loading.remove wire:target='removeItem({{ $item['product_id'] }})'>Remove</span>
                      <span wire:loading wire:target='removeItem({{ $item['product_id'] }})'>Removing...</span>
                    </button>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center py-4 text-4xl font-semibold text-slate-500">
                    No items available in cart!
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Right Column - Summary (unchanged) -->
      <div class="md:w-1/4">
        <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
          <h2 class="text-lg font-semibold mb-4">Summary</h2>
          <div class="flex justify-between mb-2">
            <span>Subtotal</span>
            <span>{{ Number::currency($grand_total, 'BDT') }}</span>
          </div>
          <div class="flex justify-between mb-2">
            <span>Taxes</span>
            <span>{{ Number::currency(0, 'BDT') }}</span>
          </div>
          <div class="flex justify-between mb-2">
            <span>Shipping</span>
            <span>{{ Number::currency(0, 'BDT') }}</span>
          </div>
          <hr class="my-2">
          <div class="flex justify-between mb-2">
            <span class="font-semibold">Grand Total</span>
            <span class="font-semibold">{{ Number::currency($grand_total + 0, 'BDT') }}</span>
          </div>
          @if ($cart_items)
            <a href="/checkout" class="bg-blue-500 block text-center text-white py-2 px-4 rounded-lg mt-4 w-full hover:bg-blue-600 transition">Checkout</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>