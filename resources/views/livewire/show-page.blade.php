<main>
    <!-- Page Header -->
    <section class="bg-gray-50 relative py-20 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto">
                <h1 class="text-4xl font-bold text-gray-800 mb-4 capitalize">{{ $page->title }}</h1>
                <nav class="text-sm text-gray-600 space-x-2">
                    <a wire:navigate href="/" class="text-primary hover:underline transition-colors">Home</a>
                    <span>/</span>
                    <span class="capitalize">{{ $page->title }}</span>
                </nav>
            </div>
        </div>

        <!-- Decorative Shapes -->
        <div class="absolute inset-0 pointer-events-none z-0">
            <svg class="absolute left-0 top-0 text-gray-200 opacity-10 w-48 h-auto" viewBox="0 0 192 752" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
            <svg class="absolute right-0 top-0 text-gray-200 opacity-10 w-96 h-auto" viewBox="0 0 731 746" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-20 bg-white relative z-10">
        <div class="container mx-auto px-4">
            @if ($page->image != "")
                <div class="flex flex-col lg:flex-row items-stretch gap-12">
                    <!-- Content -->
                    <div class="lg:w-7/12 w-full">
                    <article class="text-gray-800 leading-relaxed space-y-4">
                        {!! is_array($page->content) ? implode('', $page->content) : $page->content !!}
                    </article>

                    </div>

                    <!-- Image -->
                    <div class="lg:w-5/12 w-full">
                        <div class="rounded-xl shadow-xl overflow-hidden">
                            <img loading="lazy" decoding="async" src="{{ asset('storage/'.$page->image) }}"
                                 alt="{{ $page->title }}" class="w-full h-auto object-cover transition-transform duration-300 hover:scale-105">
                        </div>
                    </div>
                </div>
            @else
                <div class="max-w-5xl mx-auto">
                    <article class="rich-text prose lg:prose-lg prose-gray max-w-none text-center lg:text-left">
                        {!! $page->content !!}
                    </article>
                </div>
            @endif
        </div>
    </section>
</main>
