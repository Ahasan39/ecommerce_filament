<div>
<section class="relative w-full mx-auto">
  <a wire:navigate href="/products">
    <div class="relative w-full h-[180px] sm:h-[350px] md:h-[420px] lg:h-[574px] overflow-hidden">
      <img 
        src="{{ asset('front-assets/images/Web_Banner_KB.webp') }}" 
        alt="Khadyobitan Cover" 
        class="absolute inset-0 w-full h-full object-cover"
      />
      <div class="absolute inset-0 bg-black/0"></div>

    </div>
    </a>
</section>


{{-- <section class="w-full bg-black">
  <a href="/products" class="block">
    <div class="relative w-full aspect-[2140/933] max-h-[550px]">
      <img 
        src="{{ asset('front-assets/images/Web_Banner_KB.jpg') }}" 
        alt="Khadyobitan Cover"
        class="w-full h-full object-contain"
        loading="lazy"
      />
    </div>
  </a>
</section> --}}




{{-- Brand Section Start --}}
  {{-- <section class="py-5">
    <div class="max-w-xl mx-auto">
      <div class="text-center ">
        <div class="relative flex flex-col items-center">
          <h1 class="text-5xl font-bold dark:text-gray-200"> Browse Popular<span class="text-blue-500"> Brands
            </span> </h1>
          <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
            <div class="flex-1 h-2 bg-blue-200">
            </div>
            <div class="flex-1 h-2 bg-blue-400">
            </div>
            <div class="flex-1 h-2 bg-blue-600">
            </div>
          </div>
        </div>
        <p class="mb-5 text-base text-center text-gray-500">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus magni eius eaque?
          Pariatur
          numquam, odio quod nobis ipsum ex cupiditate?
        </p>
      </div>
    </div>
    <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0">
      <div class="grid grid-cols-1 gap-6 lg:grid-cols-4 md:grid-cols-2">

        @foreach ($brands as $brand)
          <div class="bg-white rounded-lg shadow-md dark:bg-gray-800" wire:key="{{ $brand->id }}">
            <a href="/products?selected_brands[0]={{ $brand->id }}" class="">
              <img src="{{ url('storage', $brand->image) }}" alt="{{ $brand->name }}" class="object-cover w-full h-64 rounded-t-lg">
            </a>
            <div class="p-5 text-center">
              <a href="" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                {{ $brand->name }}
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section> --}}
{{-- Brand Section End --}}

{{-- Category Section Start --}}
<div class="bg-orange-200 py-20">
  <div class="max-w-xl mx-auto">
    <div class="text-center" >
      <div class="relative flex flex-col items-center">
        <h1 class="text-5xl font-bold dark:text-gray-200">
          Browse <span class="text-blue-500"> Categories </span>
        </h1>
        <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
          <div class="flex-1 h-2 bg-blue-200"></div>
          <div class="flex-1 h-2 bg-blue-400"></div>
          <div class="flex-1 h-2 bg-blue-600"></div>
        </div>
      </div>
      <p class="mb-12 text-base text-center text-gray-500">
        Discover premium quality products like Pink Salt, Chia Seeds, Black Rice, and more.
        At Khadyobitan, we bring you natural and healthy food items directly from trusted sources.
      </p>
    </div>
  </div>

  <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">

      @foreach ($categories as $index => $category)
      <a
        class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
        href="/products?selected_categories[0]={{ $category->id }}"
        wire:key="{{ $category->id }}"
      >
        <div class="p-4 md:p-5">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <img class="h-[2.375rem] w-[2.375rem] rounded-full" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
              <div class="ms-3">
                <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                  {{ $category->name }}
                </h3>
              </div>
            </div>
            <div class="ps-3">
              <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="m9 18 6-6-6-6" />
              </svg>
            </div>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</div>
{{-- Category Section End --}}

{{-- future product section start --}}

{{-- Latest Product Section Start --}}
<section class="section-4 py-10 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="section-title mb-10 text-center">
      <h2 class="text-3xl font-bold text-gray-800">Latest Products</h2>
      <p class="text-gray-600 mt-2">Check out our latest arrivals</p>
    </div>    

    <div class="flex flex-wrap -mx-3">
      @foreach ($products as $index => $product)
      <div 
        class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3 lg:w-1/4"
        data-aos="fade-up" 
        data-aos-delay="{{ 100 * $index }}" 
        data-aos-duration="800"
      >
        <div class="border border-gray-300 dark:border-gray-700 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
          <div class="relative bg-gray-200 rounded-t-lg">
            <a href="/products/{{ $product->slug }}" class="block overflow-hidden rounded-t-lg">
              <img src="{{ url('storage', $product->images[0]) }}" alt="{{ $product->name }}" class="object-cover w-full h-56 mx-auto transition-transform duration-300 hover:scale-105">
            </a>
          </div>
          <div class="p-5">
            <div class="flex items-center justify-between mb-2">
              <h3 class="text-lg font-medium text-gray-800 dark:text-gray-400">{{ $product->name }}</h3>
            </div>
              <div class="flex items-center gap-2 mb-2">
                <span class="text-xl font-semibold text-green-600 dark:text-green-400">
                  {{ Number::currency($product->price, 'BDT') }}
                </span>

                @if ($product->compare_price && $product->compare_price > $product->price)
                  <span class="text-base line-through text-gray-500 dark:text-gray-400">
                    {{ Number::currency($product->compare_price, 'BDT') }}
                  </span>
                @endif
              </div>

          </div>
          <div class="flex justify-center p-4 border-t border-gray-300 dark:border-gray-700">
            <a wire:click.prevent='addToCart({{ $product->id }})' href="#" class="text-gray-500 flex items-center space-x-2 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-300 transition-colors duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 bi bi-cart3" viewBox="0 0 16 16">
              <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .485.379L2.89 5H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 14H4a.5.5 0 0 1-.491-.408L1.01 2H.5a.5.5 0 0 1-.5-.5zM3.102 6l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm6-1a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
              <span wire:loading.remove wire:target='addToCart({{ $product->id }})'>Add to Cart</span>
              <samp wire:loading wire:target='addToCart({{ $product->id }})'>Adding...</samp>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
{{-- end of product section --}}


{{-- Customer Review Section Start --}}
<section class="py-14 font-poppins dark:bg-gray-800">
  <div class="max-w-6xl px-4 py-6 mx-auto lg:py-4 md:px-6">
    <div class="max-w-xl mx-auto text-center">
      <h1 class="text-5xl font-bold dark:text-gray-200">
        Customer <span class="text-blue-500">Reviews</span>
      </h1>
      <div class="flex w-40 mx-auto mt-2 mb-6 overflow-hidden rounded">
        <div class="flex-1 h-2 bg-blue-200"></div>
        <div class="flex-1 h-2 bg-blue-400"></div>
        <div class="flex-1 h-2 bg-blue-600"></div>
      </div>
      <p class="mb-12 text-base text-gray-500">
        Here’s what our valued customers are saying about Khadyobitan and their shopping experience.
      </p>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
      <!-- Review 1 -->
      <div class="py-6 bg-white rounded-md shadow dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
          <div class="flex items-center px-6 mb-2 md:mb-0">
            <div class="mr-2">
              <img src="{{ asset('front-assets/images/cat-1.jpg') }}" alt="Customer Image" class="w-12 h-12 rounded-full object-cover">
            </div>
            <div>
              <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">Farzana Akter</h2>
              <p class="text-xs text-gray-500 dark:text-gray-400">Dhaka, Bangladesh</p>
            </div>
          </div>
          <p class="px-6 text-base font-medium text-gray-600 dark:text-gray-400">Joined: Jan 15, 2024</p>
        </div>
        <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
          I ordered black rice and pink salt from Khadyobitan. The packaging was excellent, and delivery was fast.
          Loved the quality of the products!
        </p>
        <div class="flex justify-between px-6 pt-4 border-t dark:border-gray-700">
          <div class="flex items-center space-x-1 text-sm text-gray-500 dark:text-gray-400">
            <span>Rating:</span>
            <span class="text-yellow-500 font-bold">★★★★☆</span>
          </div>
          <div class="flex space-x-4 text-gray-400 text-sm">
            <span class="flex items-center">
              <svg class="w-4 h-4 mr-1 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 4.354a8 8 0 1 0 8 8A8.01 8.01 0 0 0 12 4.354Zm0 14.292a6.294 6.294 0 1 1 6.294-6.294A6.3 6.3 0 0 1 12 18.646Z" />
              </svg>
              25
            </span>
            <span class="flex items-center">
              <svg class="w-4 h-4 mr-1 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2 5.5A1.5 1.5 0 0 1 3.5 4h13A1.5 1.5 0 0 1 18 5.5v9a1.5 1.5 0 0 1-1.5 1.5h-4.379l-3.5 2.5V16H3.5A1.5 1.5 0 0 1 2 14.5v-9Z" />
              </svg>
              Reply
            </span>
          </div>
        </div>
      </div>

      <!-- Review 2 -->
      <div class="py-6 bg-white rounded-md shadow dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
          <div class="flex items-center px-6 mb-2 md:mb-0">
            <div class="mr-2">
              <img src="{{ asset('front-assets/images/user.jpg') }}" alt="Customer Image" class="w-12 h-12 rounded-full object-cover">
            </div>
            <div>
              <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">Md. Tanvir Hossain</h2>
              <p class="text-xs text-gray-500 dark:text-gray-400">Chittagong, Bangladesh</p>
            </div>
          </div>
          <p class="px-6 text-base font-medium text-gray-600 dark:text-gray-400">Joined: Mar 08, 2024</p>
        </div>
        <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
          Very satisfied with their organic chia seeds. Khadyobitan is now my go-to online store for healthy food items!
        </p>
        <div class="flex justify-between px-6 pt-4 border-t dark:border-gray-700">
          <div class="flex items-center space-x-1 text-sm text-gray-500 dark:text-gray-400">
            <span>Rating:</span>
            <span class="text-yellow-500 font-bold">★★★★★</span>
          </div>
          <div class="flex space-x-4 text-gray-400 text-sm">
            <span class="flex items-center">
              <svg class="w-4 h-4 mr-1 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 4.354a8 8 0 1 0 8 8A8.01 8.01 0 0 0 12 4.354Zm0 14.292a6.294 6.294 0 1 1 6.294-6.294A6.3 6.3 0 0 1 12 18.646Z" />
              </svg>
              18
            </span>
            <span class="flex items-center">
              <svg class="w-4 h-4 mr-1 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2 5.5A1.5 1.5 0 0 1 3.5 4h13A1.5 1.5 0 0 1 18 5.5v9a1.5 1.5 0 0 1-1.5 1.5h-4.379l-3.5 2.5V16H3.5A1.5 1.5 0 0 1 2 14.5v-9Z" />
              </svg>
              Reply
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- Customer Review Section End --}}


</div>
