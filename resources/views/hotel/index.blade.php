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
                    displayRooms(result.data.block);
                } else if (result.block && Array.isArray(result.block)) {
                    // Fallback for direct block structure
                    displayRooms(result.block);
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

        function displayRooms(rooms) {
            const resultsDiv = document.getElementById('roomResults');

            if (!Array.isArray(rooms) || rooms.length === 0) {
                resultsDiv.innerHTML = '<p class="text-gray-500">No rooms found.</p>';
                return;
            }

            let html = '<h3 class="text-lg font-medium text-gray-900 mb-4">Available Rooms (' + rooms.length +
                ' options)</h3>';
            html += '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">';

            rooms.forEach(room => {
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

                html += `
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                        <h4 class="font-semibold text-lg mb-3 text-blue-800">${roomName}</h4>
                        <div class="space-y-2 text-sm text-gray-600">
                            <p><strong>Price:</strong> <span class="text-green-600 font-semibold">${priceFormatted}</span> per night</p>
                            <p><strong>Guests:</strong> ${adults} adults${children > 0 ? `, ${children} children` : ''}</p>
                            <p><strong>Max Occupancy:</strong> ${maxOccupancy}</p>
                            <p><strong>Room Size:</strong> ${roomSize} m²</p>
                            <p><strong>Breakfast:</strong> ${breakfast}</p>
                            <p><strong>Refundable:</strong> <span class="${refundable === 'Yes' ? 'text-green-600' : 'text-red-600'}">${refundable}</span></p>
                        </div>
                    </div>
                `;
            });

            html += '</div>';
            resultsDiv.innerHTML = html;
        }
    </script>
</x-app-layout>
