<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HotelController extends Controller
{
    public function index()
    {
        return view('hotel.index');
    }

    private function getSampleData()
    {
        return [
            'status' => true,
            'data' => [
                'block' => [
                    [
                        'name' => 'Deluxe Room with Sea View',
                        'room_name' => 'Deluxe Room with Sea View',
                        'product_price_breakdown' => [
                            'gross_amount' => [
                                'value' => 150.00,
                                'currency' => 'EUR',
                                'amount_rounded' => 'EUR 150'
                            ]
                        ],
                        'max_occupancy' => 2,
                        'room_surface_in_m2' => 35,
                        'refundable' => true,
                        'breakfast_included' => true,
                        'nr_adults' => 2,
                        'nr_children' => 0
                    ],
                    [
                        'name' => 'Standard Double Room',
                        'room_name' => 'Standard Double Room',
                        'product_price_breakdown' => [
                            'gross_amount' => [
                                'value' => 120.00,
                                'currency' => 'EUR',
                                'amount_rounded' => 'EUR 120'
                            ]
                        ],
                        'max_occupancy' => 2,
                        'room_surface_in_m2' => 25,
                        'refundable' => false,
                        'breakfast_included' => false,
                        'nr_adults' => 2,
                        'nr_children' => 0
                    ],
                    [
                        'name' => 'Family Suite',
                        'room_name' => 'Family Suite',
                        'product_price_breakdown' => [
                            'gross_amount' => [
                                'value' => 200.00,
                                'currency' => 'EUR',
                                'amount_rounded' => 'EUR 200'
                            ]
                        ],
                        'max_occupancy' => 4,
                        'room_surface_in_m2' => 50,
                        'refundable' => true,
                        'breakfast_included' => true,
                        'nr_adults' => 2,
                        'nr_children' => 2
                    ],
                    [
                        'name' => 'Executive Room',
                        'room_name' => 'Executive Room',
                        'product_price_breakdown' => [
                            'gross_amount' => [
                                'value' => 180.00,
                                'currency' => 'EUR',
                                'amount_rounded' => 'EUR 180'
                            ]
                        ],
                        'max_occupancy' => 2,
                        'room_surface_in_m2' => 40,
                        'refundable' => true,
                        'breakfast_included' => true,
                        'nr_adults' => 2,
                        'nr_children' => 0
                    ],
                    [
                        'name' => 'Budget Single Room',
                        'room_name' => 'Budget Single Room',
                        'product_price_breakdown' => [
                            'gross_amount' => [
                                'value' => 80.00,
                                'currency' => 'EUR',
                                'amount_rounded' => 'EUR 80'
                            ]
                        ],
                        'max_occupancy' => 1,
                        'room_surface_in_m2' => 18,
                        'refundable' => false,
                        'breakfast_included' => false,
                        'nr_adults' => 1,
                        'nr_children' => 0
                    ]
                ]
            ],
            'sample_data' => true,
            'message' => 'API not available - showing sample data'
        ];
    }

    public function getRoomList(Request $request)
    {
        try {
            $hotelId = $request->get('hotel_id', '74717');
            $adults = $request->get('adults', '1');
            $childrenAge = $request->get('children_age', '1,0');
            $roomQty = $request->get('room_qty', '1');

            // Add required date parameters
            $arrivalDate = $request->get('arrival_date', date('Y-m-d', strtotime('+1 day')));
            $departureDate = $request->get('departure_date', date('Y-m-d', strtotime('+2 days')));

            $response = Http::timeout(60)->withOptions([
                'verify' => false, // Disable SSL verification for development
            ])->withHeaders([
                'x-rapidapi-host' => 'booking-com15.p.rapidapi.com',
                'x-rapidapi-key' => '2a35ac7be7msha3a94ff316f1809p194095jsn6dcc5080492e'
            ])->get('https://booking-com15.p.rapidapi.com/api/v1/hotels/getRoomList', [
                'hotel_id' => $hotelId,
                'arrival_date' => $arrivalDate,
                'departure_date' => $departureDate,
                'adults' => $adults,
                'children_age' => $childrenAge,
                'room_qty' => $roomQty,
                'units' => 'metric',
                'temperature_unit' => 'c',
                'languagecode' => 'en-us',
                'currency_code' => 'EUR',
                'location' => 'US'
            ]);

            if ($response->successful()) {
                // Return the raw API response without filtering, just like the cURL example
                return response()->json($response->json());
            } else {
                // Log the error for debugging
                Log::error('API Request Failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'headers' => $response->headers()
                ]);

                // Return sample data when API fails
                Log::info('API failed, returning sample data');
                return response()->json($this->getSampleData());
            }
        } catch (\Exception $e) {
            Log::error('Hotel API Error: ' . $e->getMessage());

            // Return sample data when exception occurs
            Log::info('Exception occurred, returning sample data');
            return response()->json($this->getSampleData());
        }
    }
}
