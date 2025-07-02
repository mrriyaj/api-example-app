<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hotel Rooms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Search Hotel Rooms</h3>

                        <form id="roomSearchForm" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label for="hotel_id" class="block text-sm font-medium text-gray-700">Hotel ID</label>
                                <input type="text" id="hotel_id" name="hotel_id" value="74717"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="adults" class="block text-sm font-medium text-gray-700">Adults</label>
                                <input type="number" id="adults" name="adults" value="2" min="1"
                                    max="10"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="children_age" class="block text-sm font-medium text-gray-700">Children Ages
                                    (comma separated)</label>
                                <input type="text" id="children_age" name="children_age" value="5,8"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="room_qty" class="block text-sm font-medium text-gray-700">Room
                                    Quantity</label>
                                <input type="number" id="room_qty" name="room_qty" value="1" min="1"
                                    max="5"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </form>

                        <div class="mt-4">
                            <button type="button" onclick="searchRooms()"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Search Rooms
                            </button>
                        </div>
                    </div>

                    <div id="loading" class="hidden text-center py-4">
                        <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-gray-900"></div>
                        <p class="mt-2">Loading rooms...</p>
                    </div>

                    <div id="error"
                        class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    </div>

                    <div id="roomResults" class="mt-6">
                        <!-- Room results will be displayed here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Global variable to store exchange rates
        let exchangeRates = {};

        // Fetch exchange rates from API
        async function fetchExchangeRates() {
            try {
                const response = await fetch('{{ route('hotels.api.currency') }}');
                const data = await response.json();

                if (data.success) {
                    exchangeRates = data.rates;
                    console.log('Exchange rates loaded:', exchangeRates);
                    if (data.fallback) {
                        console.warn('Using fallback exchange rates');
                    }
                } else {
                    console.error('Failed to fetch exchange rates');
                    // Fallback rates if API fails
                    exchangeRates = {
                        'EUREUR': 1,
                        'EURUSD': 1.09,
                        'EURGBP': 0.86,
                        'EURCAD': 1.48,
                        'EURLKR': 330.5
                    };
                }
            } catch (error) {
                console.error('Error fetching exchange rates:', error);
                // Fallback rates if API fails
                exchangeRates = {
                    'EUREUR': 1,
                    'EURUSD': 1.09,
                    'EURGBP': 0.86,
                    'EURCAD': 1.48,
                    'EURLKR': 330.5
                };
            }
        } // Convert price to specific currency
        function convertPrice(priceInEur, targetCurrency) {
            if (!priceInEur || isNaN(priceInEur)) return 'N/A';

            const rateKey = `EUR${targetCurrency}`;
            const rate = exchangeRates[rateKey] || 1;
            const convertedPrice = priceInEur * rate;

            return convertedPrice.toFixed(2);
        }

        // Convert price to all currencies
        function convertPriceToAllCurrencies(priceInEur) {
            if (!priceInEur || isNaN(priceInEur)) {
                return {
                    EUR: 'N/A',
                    USD: 'N/A',
                    GBP: 'N/A',
                    CAD: 'N/A',
                    LKR: 'N/A'
                };
            }

            return {
                EUR: priceInEur.toFixed(2),
                USD: convertPrice(priceInEur, 'USD'),
                GBP: convertPrice(priceInEur, 'GBP'),
                CAD: convertPrice(priceInEur, 'CAD'),
                LKR: convertPrice(priceInEur, 'LKR')
            };
        }

        // Load exchange rates when page loads
        document.addEventListener('DOMContentLoaded', function() {
            fetchExchangeRates();
        });

        async function searchRooms() {
            const form = document.getElementById('roomSearchForm');
            const formData = new FormData(form);
            const params = new URLSearchParams(formData);

            // Show loading
            document.getElementById('loading').classList.remove('hidden');
            document.getElementById('error').classList.add('hidden');
            document.getElementById('roomResults').innerHTML = '';

            try {
                const response = await fetch(`{{ route('hotels.api.rooms') }}?${params}`);

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();

                document.getElementById('loading').classList.add('hidden');

                // Check if there's an error in the response
                if (result.error) {
                    showError(`API Error: ${result.error}${result.message ? ' - ' + result.message : ''}`);
                    return;
                }

                // Check for room data in the response
                if (result.status && result.data && result.data.block && Array.isArray(result.data.block)) {
                    displayRooms(result.data.block, result);
                } else if (result.block && Array.isArray(result.block)) {
                    // Fallback for direct block structure
                    displayRooms(result.block, result);
                } else {
                    showError('No room data found or invalid response format');
                    console.error('Invalid response format:', result);
                }
            } catch (error) {
                document.getElementById('loading').classList.add('hidden');
                showError('Failed to fetch room data: ' + error.message);
            }
        }

        function showError(message) {
            const errorDiv = document.getElementById('error');
            errorDiv.textContent = message;
            errorDiv.classList.remove('hidden');
        }

        function displayRooms(rooms, metadata = {}) {
            const resultsDiv = document.getElementById('roomResults');

            if (!Array.isArray(rooms) || rooms.length === 0) {
                resultsDiv.innerHTML = '<p class="text-gray-500">No rooms found.</p>';
                return;
            }

            let html = '';

            // Show sample data notice if applicable
            if (metadata.sample_data) {
                html += '<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">';
                html += '<strong>Notice:</strong> ' + (metadata.message ||
                    'Showing sample data because API is not available');
                html += '</div>';
            }

            html += '<h3 class="text-lg font-medium text-gray-900 mb-4">Available Rooms (' + rooms.length +
                ' options)</h3>';

            // Create table instead of grid
            html += '<div class="overflow-x-auto">';
            html += '<table class="min-w-full bg-white border border-gray-200 rounded-lg">';
            html += '<thead class="bg-gray-50">';
            html += '<tr>';
            html +=
                '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Room Name</th>';
            html +=
                '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">EUR Price</th>';
            html +=
                '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">USD Price</th>';
            html +=
                '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">GBP Price</th>';
            html +=
                '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CAD Price</th>';
            html +=
                '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">LKR Price</th>';
            html +=
                '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guests</th>';
            html +=
                '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Max Occupancy</th>';
            html +=
                '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Room Size</th>';
            html +=
                '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Breakfast</th>';
            html +=
                '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Refundable</th>';
            html += '</tr>';
            html += '</thead>';
            html += '<tbody class="bg-white divide-y divide-gray-200">';

            rooms.forEach((room, index) => {
                const price = room.product_price_breakdown?.gross_amount?.value || 'N/A';
                const currency = room.product_price_breakdown?.gross_amount?.currency || 'EUR';
                const priceFormatted = room.product_price_breakdown?.gross_amount?.amount_rounded ||
                    `${currency} ${price}`;
                const roomName = room.name || room.room_name || 'Unknown Room';
                const maxOccupancy = room.max_occupancy || 'N/A';
                const roomSize = room.room_surface_in_m2 || 'N/A';
                const refundable = room.refundable ? 'Yes' : 'No';
                const breakfast = room.breakfast_included ? 'Included' : 'Not included';
                const adults = room.nr_adults || 'N/A';
                const children = room.nr_children || 0;

                // Convert price to all currencies
                const allPrices = convertPriceToAllCurrencies(price);

                html += `
                    <tr class="${index % 2 === 0 ? 'bg-white' : 'bg-gray-50'} hover:bg-blue-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">${roomName}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-green-600">€${allPrices.EUR}</div>
                            <div class="text-xs text-gray-500">per night</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-blue-600">$${allPrices.USD}</div>
                            <div class="text-xs text-gray-500">per night</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-purple-600">£${allPrices.GBP}</div>
                            <div class="text-xs text-gray-500">per night</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-red-600">C$${allPrices.CAD}</div>
                            <div class="text-xs text-gray-500">per night</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-orange-600">₨${allPrices.LKR}</div>
                            <div class="text-xs text-gray-500">per night</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            ${adults} adults${children > 0 ? `, ${children} children` : ''}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            ${maxOccupancy}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            ${roomSize} m²
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            ${breakfast}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${refundable === 'Yes' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                                ${refundable}
                            </span>
                        </td>
                    </tr>
                `;
            });

            html += '</tbody>';
            html += '</table>';
            html += '</div>';
            resultsDiv.innerHTML = html;
        }
    </script>
</x-app-layout>
