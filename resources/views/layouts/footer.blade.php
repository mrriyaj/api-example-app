<footer class="bg-gray-800 text-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center mb-4">
                    <x-application-logo class="block h-8 w-auto fill-current text-white" />
                    <span class="ml-2 text-xl font-bold">{{ config('app.name', 'Laravel') }}</span>
                </div>
                <p class="text-gray-400 max-w-md">
                    Your trusted partner in finding the perfect accommodations worldwide.
                    Compare prices across multiple currencies and book with confidence.
                </p>
                <div class="mt-6">
                    <p class="text-sm text-gray-400">
                        © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                    </p>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">Home</a>
                    </li>
                    <li><a href="{{ route('hotels.index') }}"
                            class="text-gray-400 hover:text-white transition-colors">Hotels</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition-colors">About
                            Us</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Support</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors">Help
                            Center</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="text-gray-400 hover:text-white transition-colors">Customer Service</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                    </li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="mt-8 pt-8 border-t border-gray-700">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    Built with ❤️ using Laravel and powered by real-time hotel APIs
                </p>
                <div class="mt-4 md:mt-0 flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987s11.987-5.367 11.987-11.987C24.014 5.367 18.647.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.328-1.297C4.243 14.414 3.5 12.588 3.5 10.5s.743-3.914 1.621-5.191c.88-.807 2.031-1.297 3.328-1.297s2.448.49 3.328 1.297c.878 1.277 1.621 3.103 1.621 5.191s-.743 3.914-1.621 5.191c-.88.807-2.031 1.297-3.328 1.297z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
