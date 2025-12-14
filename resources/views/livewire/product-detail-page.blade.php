<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <section class="overflow-hidden bg-white py-11 font-poppins dark:bg-gray-800">
    <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
      <div class="flex flex-wrap -mx-4">
        {{-- Product Images --}}
        <div class="w-full mb-8 md:w-1/2 md:mb-0" x-data="{ mainImage: '{{ url('storage', $product->images[0]) }}' }">
          <div class="sticky top-0 z-50 overflow-hidden">
            <div class="relative mb-6 lg:mb-10 lg:h-2/4">
              <img x-bind:src="mainImage" alt="" class="object-cover w-full lg:h-full">
            </div>
            <div class="flex-wrap hidden md:flex">
              @foreach ($product->images as $image)
                <div class="w-1/2 p-2 sm:w-1/4" x-on:click="mainImage='{{ url('storage', $image) }}'">
                  <img src="{{ url('storage', $image) }}" alt="{{ $product->name }}"
                    class="object-cover w-full lg:h-20 cursor-pointer hover:border hover:border-blue-500">
                </div>
              @endforeach
            </div>
            <div class="px-6 pb-6 mt-6 border-t border-gray-300 dark:border-gray-400">
              <div class="flex flex-wrap items-center mt-6">
                <span class="mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="w-4 h-4 text-gray-700 dark:text-gray-400 bi bi-truck" viewBox="0 0 16 16">
                    <path
                      d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                    </path>
                  </svg>
                </span>
                <h2 class="text-lg font-bold text-gray-700 dark:text-gray-400">Free Shipping</h2>
              </div>
            </div>
          </div>
        </div>

        {{-- Product Details --}}
        <div class="w-full px-4 md:w-1/2">
          <div class="lg:pl-20">
            <div class="mb-8">
              <h2 class="max-w-xl mb-2 text-2xl font-bold dark:text-gray-400 md:text-4xl">
                {{ $product->name }}
              </h2>

              {{-- Short Description --}}
              <div class="mb-6 p-4 border-l-4 border-blue-500 bg-blue-50 dark:bg-gray-700/30 rounded-md">
                <h3 class="text-lg font-semibold text-blue-800 dark:text-blue-300 mb-1">Quick Summary</h3>
                <p class="text-gray-700 dark:text-gray-200 leading-relaxed text-md">
                  {{ $product->short_description }}
                </p>
              </div>

              {{-- Price and Compare Price --}}
              <p class="inline-block mb-6 text-4xl font-bold text-gray-700 dark:text-gray-400">
                <span>{{ Number::currency($product->price,'BDT') }}</span>
                @if ($product->compare_price && $product->compare_price > $product->price)
                  <span
                    class="text-base font-normal text-red-500 line-through ml-2 dark:text-red-400">{{ Number::currency($product->compare_price, 'BDT') }}</span>
                @endif
              </p>
            </div>

            {{-- Quantity Control --}}
            <div class="w-32 mb-8">
              <label
                class="w-full pb-1 text-xl font-semibold text-gray-700 border-b border-blue-300 dark:border-gray-600 dark:text-gray-400">
                Quantity
              </label>
              <div class="relative flex flex-row w-full h-10 mt-6 bg-transparent rounded-lg">
                <button wire:click='decreaseQty'
                  class="w-20 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 hover:text-gray-700 dark:bg-gray-900 hover:bg-gray-400">
                  <span class="m-auto text-2xl font-thin">-</span>
                </button>
                <input type="number" wire:model='quantity' readonly
                  class="flex items-center w-full font-semibold text-center text-gray-700 placeholder-gray-700 bg-gray-300 outline-none dark:text-gray-400 dark:placeholder-gray-400 dark:bg-gray-900 focus:outline-none text-md hover:text-black"
                  placeholder="1">
                <button wire:click='increaseQty'
                  class="w-20 h-full text-gray-600 bg-gray-300 rounded-r outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 dark:bg-gray-900 hover:text-gray-700 hover:bg-gray-400">
                  <span class="m-auto text-2xl font-thin">+</span>
                </button>
              </div>
            </div>

            <div class="flex flex-wrap items-center gap-4">
              <!-- Add to Cart -->
              <button wire:click='addToCart({{ $product->id }})'
                class="w-full p-4 bg-blue-500 rounded-md lg:w-2/5 text-gray-50 hover:bg-blue-600 dark:bg-blue-500 dark:hover:bg-blue-700 dark:text-gray-200 flex items-center justify-center gap-2 transform transition-all duration-300 hover:scale-105 hover:shadow-lg active:scale-95">
                <i class="fas fa-cart-plus text-lg"></i>
                <span wire:loading.remove wire:target='addToCart({{ $product->id }})'>Add to cart</span>
                <span wire:loading wire:target='addToCart({{ $product->id }})'>Adding...</span>
              </button>

              <!-- Order Now -->
              <button 
                x-data="{ hovering: false }" 
                x-on:mouseenter="hovering = true" 
                x-on:mouseleave="hovering = false"
                wire:click='orderNow({{ $product->id }})'
                class="w-full p-4 bg-orange-500 rounded-md lg:w-2/5 text-white hover:bg-orange-600 dark:bg-orange-500 dark:hover:bg-orange-700 dark:text-gray-200 flex items-center justify-center gap-2 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95"
                :class="{ 'animate-pulse': $wire.loading && !hovering }">

                <i class="fas fa-bolt text-lg"></i>

                <span wire:loading.remove wire:target='orderNow({{ $product->id }})'>Order Now</span>
                <span wire:loading wire:target='orderNow({{ $product->id }})'>Ordering...</span>
              </button>

              <!-- Chat With Us -->
              <a href="https://m.me/khadyobitan?ref=Hi%2C%20I%20want%20to%20place%20an%20order." target="_blank"
                class="w-full p-4 bg-blue-600 rounded-md lg:w-2/5 text-gray-50 hover:bg-blue-600 dark:bg-blue-500 dark:hover:bg-blue-700 dark:text-gray-200 flex items-center justify-center gap-2 transform transition-all duration-300 hover:scale-105 hover:shadow-lg active:scale-95">
                <i class="fab fa-facebook-messenger text-xl"></i>
                Chat With Us
              </a>

              <!-- WhatsApp Us -->
              <a href="https://wa.me/8801842299275?text={{ urlencode('Hello, I want to order: ' . $product->name) }}" target="_blank"
                class="w-full p-4 bg-green-500 rounded-md lg:w-2/5 text-white hover:bg-green-600 dark:bg-green-500 dark:hover:bg-green-700 text-center flex items-center justify-center gap-2 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                <i class="fab fa-whatsapp text-xl"></i>
                WhatsApp Us
              </a>
            </div>


          </div>
        </div>
      </div>

      {{-- Tabs Section (Description / Reviews) --}}
      <div x-data="{ tab: 'description' }" class="mt-12 border-t pt-10 border-gray-200 dark:border-gray-700">
        <div class="mb-4 border-b border-gray-300 dark:border-gray-600">
          <nav class="flex space-x-4 text-lg font-medium text-gray-700 dark:text-gray-200">
            <button @click="tab = 'description'"
              :class="tab === 'description' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'"
              class="pb-2 focus:outline-none">
              Description
            </button>
            <button @click="tab = 'reviews'"
              :class="tab === 'reviews' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'"
              class="pb-2 focus:outline-none">
              Reviews
            </button>
          </nav>
        </div>

        <div x-show="tab === 'description'" x-cloak>
          <div class="prose max-w-none text-gray-700 dark:text-gray-400">
            {!! Str::markdown($product->description) !!}
          </div>
        </div>

        <div x-show="tab === 'reviews'" x-cloak>
          <p class="text-gray-600 dark:text-gray-400">No reviews yet. Be the first to review this product!</p>
        </div>
      </div>
    </div>
  </section>
</div>
