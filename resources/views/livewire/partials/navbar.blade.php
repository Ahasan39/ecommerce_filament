<div>
  {{-- Announcement Bar --}}
  <div class="bg-orange-600 text-white text-center py-2 px-4 text-sm md:text-base flex flex-col md:flex-row justify-center items-center gap-4 md:gap-6 font-medium">
    
    <span class="inline-flex items-center gap-2">
      <a href="https://wa.me/8801842299275" target="_blank" rel="noopener noreferrer" class="underline hover:text-gray-200" aria-label="WhatsApp chat +8801842299275">
        +8801842299275
      </a>
      <!-- WhatsApp Icon -->
      <a href="https://wa.me/8801842299275" target="_blank" rel="noopener noreferrer" class="hover:text-gray-200" aria-label="WhatsApp chat">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M20.52 3.48A11.884 11.884 0 0012 0C5.372 0 0 5.373 0 12a11.94 11.94 0 001.59 6.003L0 24l6.11-1.604A11.936 11.936 0 0012 24c6.627 0 12-5.373 12-12 0-3.212-1.257-6.234-3.48-8.52zm-8.484 15.042a7.88 7.88 0 01-4.14-1.197l-.296-.176-2.438.643.65-2.37-.19-.31a7.937 7.937 0 1110.64 1.195 7.898 7.898 0 01-4.026 1.22zm4.21-5.573c-.23-.11-1.356-.67-1.565-.747-.21-.076-.363-.11-.516.11s-.59.747-.723.9c-.133.153-.266.172-.495.06-.23-.11-1.003-.37-1.91-1.177-.707-.63-1.184-1.41-1.32-1.64-.138-.23-.015-.35.1-.462.103-.102.23-.266.346-.4.114-.133.152-.23.23-.383.076-.153.038-.287-.02-.4-.06-.114-.516-1.246-.707-1.704-.187-.447-.377-.387-.516-.395-.133-.007-.287-.01-.44-.01s-.4.058-.61.287c-.21.23-.8.783-.8 1.91 0 1.126.82 2.214.935 2.367.114.153 1.615 2.467 3.92 3.458.548.236.975.377 1.307.484.55.182 1.05.156 1.448.095.44-.07 1.356-.553 1.55-1.09.19-.53.19-.985.133-1.08-.058-.094-.21-.153-.44-.263z"/>
        </svg>
      </a>
    </span>
    
    <span class="hidden md:inline-block border-l border-white h-5"></span>
    
    <span class="inline-flex items-center gap-2">
      <span>Hepline:</span>
      <a href="tel:01820551127" class="underline hover:text-gray-200" aria-label="Hotline 01820551127">01820551127</a>
    </span>
  </div>


<header class="sticky top-0 z-50 w-full bg-white shadow-sm dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
  <nav class="max-w-[85rem] w-full mx-auto px-4 sm:px-6 lg:px-8" aria-label="Global">
    <div class="flex items-center justify-between h-16 md:h-20">
      
      <!-- Logo -->
      <div class="flex-shrink-0 flex items-center">
        <a wire:navigate href="/" class="flex items-center">
          <img src="{{ asset('front-assets/images/Khadyobitan-logo.jpeg') }}" alt="Khadyobitan Logo" class="h-10 w-auto rounded-md transition-transform hover:scale-105">
          <span class="ml-2 text-xl font-bold text-gray-800 dark:text-white hidden md:block">Khadyobitan</span>
        </a>
      </div>

      <!-- Desktop Search -->
      <div class="hidden md:flex flex-1 max-w-md mx-6">
        <form action="/search" method="GET" class="w-full">
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
            <input 
              type="text" 
              name="query" 
              placeholder="Search products..." 
              class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
              aria-label="Search products"
            />
          </div>
        </form>
      </div>

      <!-- Desktop Navigation -->
      <div class="hidden md:flex items-center">
        <!-- Navigation Links with proper spacing -->
        <div class="flex space-x-8">
          <a wire:navigate href="/" class="text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->is('/') ? 'text-blue-600 dark:text-blue-400 border-b-2 border-blue-600' : '' }}">
            Home
          </a>
          
          <a wire:navigate href="/categories" class="text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->is('categories') ? 'text-blue-600 dark:text-blue-400 border-b-2 border-blue-600' : '' }}">
            Categories
          </a>
          
          <a wire:navigate href="/products" class="text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->is('products') ? 'text-blue-600 dark:text-blue-400 border-b-2 border-blue-600' : '' }}">
            Products
          </a>
        </div>

        <!-- Right-side elements -->
        <div class="flex items-center ml-8 space-x-6">
          <!-- Cart with proper spacing -->
          <a wire:navigate href="/cart" class="relative text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-white p-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span class="absolute -top-1 -right-1 flex items-center justify-center h-5 w-5 rounded-full bg-blue-600 text-white text-xs font-medium">
              {{ $total_count }}
            </span>
          </a>

          <!-- Auth Links -->
          @guest
            <div class="flex space-x-4">
              <a wire:navigate href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 transition-colors duration-200">
                Log in
              </a>
            </div>
          @endguest

          @auth
            <div class="hs-dropdown relative inline-flex ml-4">
              <button type="button" class="hs-dropdown-toggle flex items-center space-x-2 text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-white">
                <div class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                  <span class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ substr(auth()->user()->name, 0, 1) }}</span>
                </div>
                <span class="hidden lg:inline text-sm font-medium">{{ auth()->user()->name }}</span>
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>

              <div class="hs-dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-100 dark:bg-gray-800 dark:border-gray-700">
                <a href="/my-orders" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                  My Orders
                </a>
                <a href="/account" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                  My Account
                </a>
                <div class="border-t border-gray-100 dark:border-gray-700"></div>
                <form method="POST" action="/logout">
                  @csrf
                  <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                    Sign out
                  </button>
                </form>
              </div>
            </div>
          @endauth
        </div>
      </div>

      <!-- Mobile menu button -->
      <div class="md:hidden flex items-center space-x-4">
        <!-- Mobile Search Toggle -->
        <button type="button" id="mobile-search-toggle" class="p-2 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300" aria-label="Search">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </button>
        
        <!-- Cart -->
        <a wire:navigate href="/cart" class="relative p-2 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span class="absolute top-0 right-0 flex items-center justify-center h-5 w-5 rounded-full bg-blue-600 text-white text-xs font-medium">
            {{ $total_count }}
          </span>
        </a>
        
        <!-- Mobile Menu Toggle -->
        <button type="button" id="mobile-menu-toggle" class="p-2 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300" aria-label="Menu">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Search (hidden by default) -->
    <div id="mobile-search" class="hidden md:hidden px-2 pt-2 pb-3">
      <form action="/search" method="GET" class="w-full">
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </div>
          <input 
            type="text" 
            name="query" 
            placeholder="Search products..." 
            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
            aria-label="Search products"
          />
        </div>
      </form>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <a wire:navigate href="/" class="block px-3 py-2 rounded-md text-base font-medium text-blue-600 bg-blue-50 dark:text-blue-400 dark:bg-gray-900">
          Home
        </a>
        <a wire:navigate href="/categories" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 dark:text-gray-300 dark:hover:text-blue-400 dark:hover:bg-gray-700">
          Categories
        </a>
        <a wire:navigate href="/products" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 dark:text-gray-300 dark:hover:text-blue-400 dark:hover:bg-gray-700">
          Products
        </a>
      </div>
      <div class="pt-4 pb-3 border-t border-gray-200 dark:border-gray-700">
        @guest
          <div class="px-5 space-y-3">
            <a wire:navigate href="/login" class="block w-full px-4 py-2 text-center text-sm font-medium text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 dark:text-blue-400 dark:border-blue-400 dark:hover:bg-gray-700">
              Log in
            </a>
            <a wire:navigate href="/register" class="block w-full px-4 py-2 text-center text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
              Register
            </a>
          </div>
        @endguest

        @auth
          <div class="flex items-center px-5 py-3">
            <div class="flex-shrink-0">
              <div class="h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                <span class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ substr(auth()->user()->name, 0, 1) }}</span>
              </div>
            </div>
            <div class="ml-3">
              <div class="text-base font-medium text-gray-800 dark:text-white">{{ auth()->user()->name }}</div>
              <div class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</div>
            </div>
          </div>
          <div class="mt-3 px-2 space-y-1">
            <a href="/my-orders" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 dark:text-gray-300 dark:hover:text-blue-400 dark:hover:bg-gray-700">
              My Orders
            </a>
            <a href="/account" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 dark:text-gray-300 dark:hover:text-blue-400 dark:hover:bg-gray-700">
              My Account
            </a>
            <form method="POST" action="/logout">
              @csrf
              <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 dark:text-gray-300 dark:hover:text-blue-400 dark:hover:bg-gray-700">
                Sign out
              </button>
            </form>
          </div>
        @endauth
      </div>
    </div>
  </nav>
</header>


  <!-- Add this script at the bottom of your page or in your JS file -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Mobile menu toggle
      const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
      const mobileMenu = document.getElementById('mobile-menu');
      
      // Mobile search toggle
      const mobileSearchToggle = document.getElementById('mobile-search-toggle');
      const mobileSearch = document.getElementById('mobile-search');
      
      // Toggle mobile menu
      mobileMenuToggle.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
        // Close search if open
        if (!mobileSearch.classList.contains('hidden')) {
          mobileSearch.classList.add('hidden');
        }
      });
      
      // Toggle mobile search
      mobileSearchToggle.addEventListener('click', function() {
        mobileSearch.classList.toggle('hidden');
        // Close menu if open
        if (!mobileMenu.classList.contains('hidden')) {
          mobileMenu.classList.add('hidden');
        }
      });
    });
  </script>
</div>
