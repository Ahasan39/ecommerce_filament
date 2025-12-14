<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dynamic SEO Meta -->
    <title>{{ $title ?? 'খাদ্য বিতান - Khadyobitan - অনলাইন বাজার' }}</title>
    <meta name="description" content="{{ $meta_description ?? 'Buy premium food items from Khadyobitan.' }}">
    <meta name="keywords" content="{{ $meta_keywords ?? 'খাদ্য বিতান, khadyobitan, e-commerce, pink salt, chia seeds, black rice' }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="{{ $og_title ?? $title ?? 'খাদ্য বিতান - Khadyobitan - Fresh Groceries Online' }}">
    <meta property="og:description" content="{{ $og_description ?? $meta_description ?? 'Organic খাদ্য পণ্য এখন ঘরে বসেই অনলাইনে! খাদ্য বিতান থেকে সাশ্রয়ী মূল্যে কিনুন।' }}">
    <meta property="og:image" content="{{ $og_image ?? asset('images/social-preview.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta -->
    <meta name="twitter:title" content="{{ $og_title ?? $title ?? 'খাদ্য বিতান - Khadyobitan - Fresh Groceries Online' }}">
    <meta name="twitter:description" content="{{ $og_description ?? $meta_description ?? 'ঘরে বসেই অর্ডার করুন, খাদ্য বিতান আপনার দরজায় পৌঁছে দেবে।' }}">
    <meta name="twitter:image" content="{{ $og_image ?? asset('images/social-preview.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "খাদ্য বিতান - Khadyobitan",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('favicon.jpeg') }}",
      "sameAs": [
        "https://facebook.com/your-page",
        "https://instagram.com/your-page"
      ],
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+8801XXXXXXXXX",
        "contactType": "customer service",
        "areaServed": "BD",
        "availableLanguage": ["Bengali", "English"]
      }
    }
    </script>

    <!-- Favicon Variants -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon-180.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16.png') }}">
    <link rel="icon" href="{{ asset('favicon.jpeg') }}" type="image/x-icon">

    <!-- Fonts, Icons, AOS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Compiled Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-slate-200 dark:bg-slate-700">
    @livewire('partials.navbar')

    <main>
        {{ $slot }}
    </main>

    @livewire('partials.footer') 

    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

    <script>
        Livewire.on('redirectToStripe', url => {
            window.location.href = url;
        });
    </script>

    <!-- Scroll to Top Button -->
    <button 
        id="scrollToTopBtn" 
        class="fixed bottom-5 right-5 p-3 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-lg hidden z-50"
        title="Scroll to top" 
        aria-label="Scroll to top"
    >
        <i class="fas fa-arrow-up" aria-hidden="true"></i>
    </button>

    @once
    <script>
        window.addEventListener("DOMContentLoaded", function () {
            if (window.scrollToTopHandlerInitialized) return;
            window.scrollToTopHandlerInitialized = true;

            const scrollToTopBtn = document.getElementById('scrollToTopBtn');

            if (scrollToTopBtn) {
                window.addEventListener('scroll', () => {
                    scrollToTopBtn.style.display = window.scrollY > 300 ? 'block' : 'none';
                });

                scrollToTopBtn.addEventListener('click', () => {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            }
        });
    </script>
    @endonce

    <!-- AOS Init -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>

    <!-- Preline Init -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.Preline) {
                Preline.init();
            }
        });

        Livewire.hook('message.processed', (message, component) => {
            if (window.Preline) {
                Preline.init();
            }
        });
    </script>
</body>
</html>
