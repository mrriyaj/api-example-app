<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Contact Us</h2>
    </x-slot>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="max-w-7xl mx-auto py-16 px-6">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Get in Touch</h1>
                <p class="text-xl text-blue-100">
                    We're here to help with any questions about our hotel search platform.
                </p>
            </div>
        </div>
    </section>

    <div class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-bold mb-6">Send us a message</h2>

                    @if (session('status'))
                        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium">{{ session('status') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="name">Full Name</label>
                            <input id="name" name="name" type="text"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required />
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="email">Email
                                Address</label>
                            <input id="email" name="email" type="email"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required />
                            @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="message">Message</label>
                            <textarea id="message" name="message" rows="5"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tell us how we can help you..." required></textarea>
                            @error('message')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors font-medium">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Information -->
                <div>
                    <div class="bg-gray-50 rounded-lg p-8 mb-8">
                        <h3 class="text-xl font-bold mb-6">Other Ways to Reach Us</h3>

                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 7.89a2 2 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Email</p>
                                    <p class="text-sm text-gray-600">support@hotelapp.com</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Phone</p>
                                    <p class="text-sm text-gray-600">+1 (555) 123-4567</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Business Hours</p>
                                    <p class="text-sm text-gray-600">Monday - Friday: 9AM - 6PM EST</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Section -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold mb-4">Frequently Asked Questions</h3>
                        <div class="space-y-3">
                            <details class="group">
                                <summary
                                    class="flex cursor-pointer items-center justify-between py-2 text-sm font-medium text-gray-900">
                                    How do I search for hotels?
                                    <svg class="h-5 w-5 text-gray-500 group-open:rotate-180" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </summary>
                                <p class="mt-2 text-sm text-gray-600">Simply enter a hotel ID in our search form on the
                                    Hotels page, and we'll show you available rooms with pricing in multiple currencies.
                                </p>
                            </details>
                            <details class="group">
                                <summary
                                    class="flex cursor-pointer items-center justify-between py-2 text-sm font-medium text-gray-900">
                                    What currencies do you support?
                                    <svg class="h-5 w-5 text-gray-500 group-open:rotate-180" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </summary>
                                <p class="mt-2 text-sm text-gray-600">We support EUR, USD, GBP, CAD, and LKR with
                                    real-time exchange rates.</p>
                            </details>
                            <details class="group">
                                <summary
                                    class="flex cursor-pointer items-center justify-between py-2 text-sm font-medium text-gray-900">
                                    Is the pricing real-time?
                                    <svg class="h-5 w-5 text-gray-500 group-open:rotate-180" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </summary>
                                <p class="mt-2 text-sm text-gray-600">Yes, we use real-time APIs to fetch the latest
                                    availability and pricing information from hotels.</p>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
