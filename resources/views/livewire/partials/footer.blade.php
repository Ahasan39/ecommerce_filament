<footer class="bg-gray-900 text-white w-full">
    <div class="max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <!-- Footer Grid -->
        <div class="grid gap-10 sm:grid-cols-2 md:grid-cols-4">
            <!-- Brand Info -->
            <div>
                <h3 class="text-xl font-bold">Khadyobitan</h3>
                <p class="mt-4 text-gray-400 text-sm leading-relaxed">
                    Your trusted destination for quality food <br> products. We ensure freshness and <br> customer satisfaction with every delivery.
                </p>
            </div>

            <!-- Product Links -->
            <div>
                <h4 class="text-lg font-semibold">Product</h4>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a wire:navigate href="/categories" class="text-gray-400 hover:text-white transition">Categories</a></li>
                    <li><a wire:navigate href="/products" class="text-gray-400 hover:text-white transition">All Products</a></li>
                    <li><a wire:navigate href="/products?featured=true" class="text-gray-400 hover:text-white transition">Featured Products</a></li>
                </ul>
            </div>

            <!-- Company Links -->
            <div>
                <h4 class="text-lg font-semibold">Company</h4>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a wire:navigate href="{{ route('page', 1) }}" class="text-gray-400 hover:text-white transition">About Us</a></li>
                    <li><a wire:navigate href="{{ route('page', 3) }}" class="text-gray-400 hover:text-white transition">Terms & Conditions</a></li>
                    <li><a wire:navigate href="{{ route('page', 4) }}" class="text-gray-400 hover:text-white transition">Privacy Policy</a></li>
                    <li><a wire:navigate href="{{ route('page', 6) }}" class="text-gray-400 hover:text-white transition">Refund and return policy</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="text-lg font-semibold">Newsletter</h4>
                <p class="mt-4 text-gray-400 text-sm">Stay updated with our latest offers.</p>
                <form class="mt-4 space-y-3">
                    <input type="email" placeholder="Your email"
                        class="w-full px-4 py-2 rounded text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 transition text-white px-4 py-2 rounded text-sm">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-700 mt-10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <!-- Social Icons -->
            <div class="flex space-x-4">
                <a href="https://www.facebook.com/khadyobitan" target="_blank" title="Share on Facebook" aria-label="Share on Facebook" class="text-white hover:text-blue-500 transition">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a href="https://wa.me/8801842299275" target="_blank" title="Chat on WhatsApp" aria-label="Chat on WhatsApp" class="text-white hover:text-green-500 transition">
                    <i class="fab fa-whatsapp"></i>
                </a>

                <a href="#" title="Go to top" aria-label="Go to top" class="text-white hover:text-cyan-400 transition">
                    <i class="fas fa-arrow-up"></i>
                </a>

            </div>

            <!-- Developer Info and Copyright -->
            <div class="text-sm text-gray-400 text-center sm:text-right">
                <p>Developed by <a href="https://imamsworld.quicktechsolution.com" target="_blank" class="hover:text-white underline">Imamul Ahasan</a></p>
                <p>© 2025 Khadyobitan. All rights reserved.</p>
            </div>
        </div>

    </div>
</footer>
