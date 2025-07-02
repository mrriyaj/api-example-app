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
                'x-rapidapi-key' => '1b0ea7eac5msh919a366c10a47b7p18eaebjsn3edd25b0d845'
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

                // Return the raw error response from the API
                return response($response->body(), $response->status())
                    ->header('Content-Type', 'application/json');
            }
        } catch (\Exception $e) {
            Log::error('Hotel API Error: ' . $e->getMessage());

            // Return a simple error response
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'API request failed'
            ], 500);
        }
    }
}
