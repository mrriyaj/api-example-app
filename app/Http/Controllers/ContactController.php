<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:2000',
        ]);

        Log::info('Contact form submitted', $validated);

        return back()->with('status', 'Thanks for contacting us! We\'ll get back to you soon.');
    }
}
