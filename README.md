# Hotel Room Search Application

A modern Laravel application that allows users to search for hotel rooms with real-time currency conversion across multiple currencies. The application integrates with the Booking.com API for hotel data and provides multi-currency pricing using live exchange rates.

## 🌟 Features

-   **Hotel Room Search**: Search for available hotel rooms using various parameters
-   **Multi-Currency Display**: View prices in 5 currencies simultaneously (EUR, USD, GBP, CAD, LKR)
-   **Real-Time Currency Conversion**: Live exchange rates from API Layer
-   **Sample Data Fallback**: Shows sample data when external APIs are unavailable
-   **Responsive Design**: Works seamlessly on desktop and mobile devices
-   **User Authentication**: Built-in user registration and login system
-   **Clean UI**: Modern, professional interface using Tailwind CSS

## 🔧 Technology Stack

-   **Framework**: Laravel 12.x
-   **Frontend**: Blade Templates, Tailwind CSS, JavaScript
-   **Authentication**: Laravel Breeze
-   **PHP Version**: ^8.2
-   **Database**: SQLite/MySQL (configurable)
-   **HTTP Client**: Laravel HTTP Client (Guzzle)

## 📋 Requirements

-   PHP 8.2 or higher
-   Composer
-   Node.js & NPM (for frontend assets)
-   Git

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/api-example-app.git
cd api-example-app
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

# Build frontend assets
npm run build
```

### 3. Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Configure Environment Variables

Edit `.env` file and update the following:

```env
APP_NAME="Hotel Room Search"
APP_URL=http://localhost:8000

# Database Configuration
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=hotel_app
# DB_USERNAME=root
# DB_PASSWORD=

# API Keys (if you have your own)
BOOKING_API_KEY=your_booking_api_key_here
CURRENCY_API_KEY=your_currency_api_key_here
```

### 5. Database Setup

```bash
# Run database migrations
php artisan migrate

# (Optional) Seed the database
php artisan db:seed
```

### 6. Start the Development Server

```bash
php artisan serve
```

Visit `http://localhost:8000` to access the application.

## 🎯 Usage

### Hotel Room Search

1. **Navigate to Hotels**: Go to `/hotels` or click "Hotel Rooms" in the navigation
2. **Enter Search Parameters**:
    - **Hotel ID**: Default is 74717 (you can change this)
    - **Adults**: Number of adult guests (1-10)
    - **Children Ages**: Comma-separated ages (e.g., "5,8")
    - **Room Quantity**: Number of rooms needed (1-5)
3. **Click "Search Rooms"**: View results in a comprehensive table

### Currency Display

The application automatically displays prices in all supported currencies:

-   **EUR (€)**: Euro - Base currency
-   **USD ($)**: US Dollar
-   **GBP (£)**: British Pound
-   **CAD (C$)**: Canadian Dollar
-   **LKR (₨)**: Sri Lankan Rupee

### Sample Data Mode

When external APIs are unavailable, the application shows sample hotel data with a clear notification banner.

## 🏗️ Project Structure

```
app/
├── Http/
│   └── Controllers/
│       └── HotelController.php     # Main hotel logic
│
resources/
├── views/
│   ├── hotel/
│   │   └── index.blade.php         # Hotel search interface
│   └── layouts/
│       └── app.blade.php           # Main layout
│
routes/
└── web.php                         # Application routes

public/
├── build/                          # Compiled assets
└── index.php                       # Entry point
```

## 🔌 API Endpoints

### Public Routes

-   `GET /` - Welcome page
-   `GET /hotels` - Hotel search interface
-   `GET /api/hotels/rooms` - Get hotel room data
-   `GET /api/hotels/currency-rates` - Get exchange rates

### Authentication Routes

-   `GET /login` - Login page
-   `GET /register` - Registration page
-   `GET /dashboard` - User dashboard
-   `GET /profile` - User profile management

## 🌐 External APIs

### Booking.com API

-   **Endpoint**: `https://booking-com15.p.rapidapi.com/api/v1/hotels/getRoomList`
-   **Purpose**: Fetch real hotel room data
-   **Fallback**: Sample data when API is unavailable

### Currency API (API Layer)

-   **Endpoint**: `http://apilayer.net/api/live`
-   **Purpose**: Get real-time exchange rates
-   **Fallback**: Predefined exchange rates

## 🛠️ Development

### Running Tests

```bash
php artisan test
```

### Code Style

```bash
# Format code using Laravel Pint
./vendor/bin/pint
```

### Frontend Development

```bash
# Watch for changes during development
npm run dev

# Build for production
npm run build
```

## 📱 Features in Detail

### Hotel Controller Features

-   **Simple Design**: Clean, easy-to-understand code structure
-   **Error Handling**: Comprehensive error handling with user-friendly messages
-   **Caching**: Built-in caching for better performance
-   **Validation**: Input validation for all search parameters
-   **Logging**: Detailed logging for debugging and monitoring

### Frontend Features

-   **Responsive Table**: Scrollable table that works on all screen sizes
-   **Loading States**: Visual feedback during API calls
-   **Error Messages**: Clear error notifications for users
-   **Sample Data Notices**: Informative banners when showing fallback data
-   **Color-Coded Currencies**: Each currency has distinct colors for easy identification

### Currency Conversion

-   **Live Rates**: Real-time exchange rate fetching
-   **Multiple Currencies**: Support for 5 major currencies
-   **Automatic Conversion**: Converts EUR base prices to all currencies
-   **Fallback Rates**: Predefined rates when API is unavailable
-   **Precise Calculations**: 2 decimal place precision for all conversions

## 🚨 Troubleshooting

### Common Issues

**1. API Rate Limiting (HTTP 429)**

-   The application shows sample data when APIs are rate-limited
-   Wait for the rate limit to reset or upgrade API plans

**2. Missing Exchange Rates**

-   Application uses fallback rates automatically
-   Check currency API configuration in the controller

**3. No Hotel Data**

-   Verify the hotel ID is correct (default: 74717)
-   Check if the Booking.com API is accessible
-   Sample data will be shown if API fails

**4. Frontend Assets Not Loading**

-   Run `npm run build` to compile assets
-   Check if Node.js and NPM are installed correctly

### Logs

Check application logs for detailed error information:

```bash
tail -f storage/logs/laravel.log
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

Created with ❤️ for learning and demonstration purposes.

## 🙏 Acknowledgments

-   [Laravel Framework](https://laravel.com/) - The web application framework
-   [Booking.com API](https://rapidapi.com/apidojo/api/booking/) - Hotel data provider
-   [API Layer](https://apilayer.com/) - Currency exchange rates
-   [Tailwind CSS](https://tailwindcss.com/) - Utility-first CSS framework
-   [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) - Authentication scaffolding

## 📞 Support

If you encounter any issues or have questions, please create an issue in the GitHub repository.

---

**Happy Coding! 🚀**

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Redberry](https://redberry.international/laravel-development)**
-   **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
