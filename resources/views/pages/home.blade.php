<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-2">Welcome to the Hotel Room Search App</h3>
                    <p class="text-gray-600">Search and compare hotel rooms with live multi-currency pricing.</p>
                    <div class="mt-6">
                        <a href="{{ route('hotels.index') }}"
                            class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Browse
                            Hotels</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
