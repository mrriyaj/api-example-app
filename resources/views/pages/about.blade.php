<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">About Us</h2>
    </x-slot>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="max-w-7xl mx-auto py-20 px-6">
            <div class="max-w-3xl">
                <h1 class="text-4xl font-bold mb-6">Revolutionizing Hotel Search Experience</h1>
                <p class="text-xl text-blue-100">
                    We're on a mission to make hotel booking transparent, fast, and accessible to everyone worldwide
                    with real-time pricing in multiple currencies.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=1200&auto=format&fit=crop"
                        alt="Modern hotel lobby" class="rounded-lg shadow-lg">
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Story</h2>
                    <p class="text-gray-600 mb-4">
                        Founded with a vision to simplify hotel booking, our platform connects travelers with the
                        perfect accommodations
                        while providing transparent pricing across multiple currencies.
                    </p>
                    <p class="text-gray-600 mb-6">
                        We leverage cutting-edge APIs and modern web technologies to deliver real-time availability,
                        competitive pricing, and detailed property information to help you make informed decisions.
                    </p>
                    <a href="{{ route('contact') }}"
                        class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Grid -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Choose Us?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    We're committed to providing the best hotel search experience with innovative features and reliable
                    service.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="text-blue-600 text-3xl mb-4">🌍</div>
                    <h3 class="text-xl font-semibold mb-3">Global Coverage</h3>
                    <p class="text-gray-600">Access hotels worldwide with comprehensive property data and real-time
                        availability.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="text-blue-600 text-3xl mb-4">💱</div>
                    <h3 class="text-xl font-semibold mb-3">Multi-Currency</h3>
                    <p class="text-gray-600">View prices in EUR, USD, GBP, CAD, and LKR with live exchange rates.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="text-blue-600 text-3xl mb-4">⚡</div>
                    <h3 class="text-xl font-semibold mb-3">Lightning Fast</h3>
                    <p class="text-gray-600">Modern architecture ensures quick search results and smooth user
                        experience.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="text-blue-600 text-3xl mb-4">🛡️</div>
                    <h3 class="text-xl font-semibold mb-3">Reliable Data</h3>
                    <p class="text-gray-600">Powered by trusted hotel APIs with intelligent fallback systems.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="text-blue-600 text-3xl mb-4">📱</div>
                    <h3 class="text-xl font-semibold mb-3">Mobile Friendly</h3>
                    <p class="text-gray-600">Responsive design that works perfectly on all devices and screen sizes.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="text-blue-600 text-3xl mb-4">🎯</div>
                    <h3 class="text-xl font-semibold mb-3">User Focused</h3>
                    <p class="text-gray-600">Simple, intuitive interface designed with user experience at the forefront.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto text-center px-6">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Ready to Find Your Perfect Stay?</h2>
            <p class="text-gray-600 mb-8">
                Start exploring thousands of hotels with transparent pricing and detailed information.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('hotels.index') }}"
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    Browse Hotels
                </a>
                <a href="{{ route('contact') }}"
                    class="border border-blue-600 text-blue-600 px-8 py-3 rounded-lg hover:bg-blue-50 transition-colors">
                    Contact Support
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
