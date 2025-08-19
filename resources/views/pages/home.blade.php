<x-app-layout>
    <!-- Hero Section -->
    <section class="relative">
        <img src="https://images.unsplash.com/photo-1501117716987-c8e3f7f1d3f4?q=80&w=1920&auto=format&fit=crop"
            alt="Luxury property" class="h-[48vh] w-full object-cover">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="absolute inset-0 flex items-center">
            <div class="max-w-7xl mx-auto w-full px-6">
                <h1 class="text-3xl md:text-5xl font-bold text-white">Find your perfect stay</h1>
                <p class="mt-3 text-white/90 max-w-2xl">Discover handpicked properties worldwide. Compare rooms,
                    amenities, and prices across currencies.</p>

                <!-- Quick Search -->
                <div class="mt-6 bg-white/95 backdrop-blur rounded-lg shadow p-4 grid grid-cols-1 md:grid-cols-5 gap-3">
                    <div class="md:col-span-2">
                        <label class="text-sm text-gray-600">Destination or Hotel ID</label>
                        <input type="text" id="hero_hotel_id" value="74717"
                            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Adults</label>
                        <input type="number" id="hero_adults" value="2" min="1"
                            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Rooms</label>
                        <input type="number" id="hero_rooms" value="1" min="1"
                            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    </div>
                    <div class="flex items-end">
                        <a href="{{ route('hotels.index') }}" id="hero_search_btn"
                            class="w-full text-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Search</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="text-blue-600 text-2xl font-bold">Live Rates</div>
                    <p class="mt-2 text-gray-600">See prices in EUR, USD, GBP, CAD, and LKR instantly.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="text-blue-600 text-2xl font-bold">Real Data</div>
                    <p class="mt-2 text-gray-600">Powered by real hotel APIs with graceful fallbacks.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="text-blue-600 text-2xl font-bold">Simple UI</div>
                    <p class="mt-2 text-gray-600">Clean, fast, and mobile-friendly experience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Properties (teaser) -->
    <section class="pb-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Latest Properties</h2>
                <a href="{{ route('hotels.index') }}" class="text-blue-600 hover:underline">View all</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1559599238-29777b6db313?q=80&w=1200&auto=format&fit=crop"
                        alt="City hotel" class="h-40 w-full object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">City Comfort Hotel</h3>
                        <p class="text-sm text-gray-600">Downtown • Free Wi‑Fi • Breakfast</p>
                        <a href="{{ route('hotels.index') }}"
                            class="mt-3 inline-block text-blue-600 hover:underline">Check availability →</a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1502920917128-1aa500764cbd?q=80&w=1200&auto=format&fit=crop"
                        alt="Beach resort" class="h-40 w-full object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">Seaside Resort</h3>
                        <p class="text-sm text-gray-600">Ocean view • Pool • Spa</p>
                        <a href="{{ route('hotels.index') }}"
                            class="mt-3 inline-block text-blue-600 hover:underline">Check availability →</a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1501183638710-841dd1904471?q=80&w=1200&auto=format&fit=crop"
                        alt="Mountain lodge" class="h-40 w-full object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">Mountain Lodge</h3>
                        <p class="text-sm text-gray-600">Nature • Fireplace • Parking</p>
                        <a href="{{ route('hotels.index') }}"
                            class="mt-3 inline-block text-blue-600 hover:underline">Check availability →</a>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <a href="{{ route('hotels.index') }}"
                    class="inline-block bg-blue-600 text-white px-5 py-2.5 rounded hover:bg-blue-700">Browse all
                    hotels</a>
            </div>
        </div>
    </section>
</x-app-layout>
