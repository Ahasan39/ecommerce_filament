# 🛒 Ecommerce Filament - Laravel E-commerce Platform

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
<a href="https://github.com/laravel/framework"><img src="https://img.shields.io/badge/Laravel-10.x-red.svg" alt="Laravel Version"></a>
<a href="https://github.com/filamentphp/filament"><img src="https://img.shields.io/badge/Filament-3.x-orange.svg" alt="Filament Version"></a>
<a href="https://github.com/livewire/livewire"><img src="https://img.shields.io/badge/Livewire-3.x-pink.svg" alt="Livewire Version"></a>
<a href="https://tailwindcss.com"><img src="https://img.shields.io/badge/Tailwind-3.x-blue.svg" alt="Tailwind Version"></a>
<a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License"></a>
</p>

## 📋 About This Project

A modern, full-featured e-commerce platform built with **Laravel 10**, **Filament 3**, **Livewire 3**, and **Alpine.js**. This application provides a complete online shopping experience with a powerful admin panel for managing products, orders, customers, and more. The frontend is styled with **Tailwind CSS** and **Preline UI** for a premium, responsive look.

### ✨ Key Features

#### 🎨 Frontend Features
- **Modern UI**: Built with Tailwind CSS and Preline UI components.
- **Dynamic Home Page**: Features Hero slider, Category browser, Latest Products, and Customer Reviews sections.
- **Product Catalog**: Browse products with advanced filtering (price, brand, category) and sorting.
- **Product Details**: Comprehensive view with images, short description, description, and specifications.
- **Shopping Cart**: Real-time cart management with cookie-based persistence (add, remove, update quantities).
- **User Authentication**: Complete auth system (Login, Register, Password Reset) built with Livewire.
- **Guest Checkout**: Allow purchases without registration.
- **Order Tracking**: Users can track their order status and history.
- **Product Search**: Fast and efficient product search functionality.
- **Responsive Design**: Fully mobile-responsive interface optimized for all devices.
- **Payment Integration**: Secure payments via **Stripe** and **Cash on Delivery**.

#### 🔧 Admin Panel (Filament)
- **Dashboard**: Comprehensive overview of sales, orders, and key statistics.
- **Product Management**: 
  - CRUD operations
  - Image uploads (multiple)
  - Short & long descriptions
  - Price & compare price
  - Stock management
  - Weight management (for shipping)
- **Order Management**: Process orders, update status (New, Processing, Shipped, Delivered), and generate invoices.
- **Customer Management**: View and manage customer accounts.
- **Category & Brand Management**: Organize products efficiently with images.
- **Page Management**: Create and manage custom pages.
- **Invoice Generation**: PDF invoice creation and download (using DomPDF).
- **Courier Integration**: **Steadfast Courier** API integration for automated shipping.
- **Discount System**: Apply discounts to orders.

#### 🚀 Advanced Features
- **Livewire Components**: Dynamic, reactive UI without page reloads (SPA-like feel).
- **Email Notifications**: Automated order confirmation emails.
- **Sitemap Generation**: Automated sitemap generation for better SEO.
- **Admin Middleware**: Secure admin access control.
- **Performance**: Optimized with caching and lazy loading.
- **Delivery Charge**: Automatic delivery fee calculation based on logic.

## 🛠️ Tech Stack

- **Framework**: [Laravel 10.x](https://laravel.com)
- **Admin Panel**: [Filament 3.x](https://filamentphp.com)
- **Frontend**: [Livewire 3.x](https://livewire.laravel.com)
- **Styling**: [Tailwind CSS](https://tailwindcss.com) & [Preline UI](https://preline.co)
- **Interactivity**: [Alpine.js](https://alpinejs.dev)
- **Database**: MySQL
- **Payment**: Stripe API
- **PDF Generation**: DomPDF
- **Courier**: Steadfast Courier API
- **Icons**: Heroicons

## 📦 Installation

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL/MariaDB

### Setup Instructions

1. **Clone the repository**
```bash
git clone https://github.com/Ahasan39/ecommerce_filament.git
cd ecommerce_filament
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install NPM dependencies**
```bash
npm install
```

4. **Environment Configuration**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure your `.env` file**
Update database and third-party service credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

# Stripe Configuration
STRIPE_KEY=your_stripe_publishable_key
STRIPE_SECRET=your_stripe_secret_key

# Mail Configuration (Required for notifications)
MAIL_MAILER=smtp
MAIL_HOST=your_mail_host
MAIL_PORT=587
MAIL_USERNAME=your_email
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"

# Steadfast Courier (Optional)
STEADFAST_API_KEY=your_api_key
STEADFAST_SECRET_KEY=your_secret_key
STEADFAST_BASE_URL=https://portal.steadfast.com.bd/api/v1
```

6. **Run migrations**
```bash
php artisan migrate
```

7. **Seed the database (Optional)**
```bash
php artisan db:seed
```

8. **Create storage link**
```bash
php artisan storage:link
```

9. **Build assets**
```bash
npm run build
# or for development
npm run dev
```

10. **Start the development server**
```bash
php artisan serve
```

Visit `http://localhost:8000` to view the application.

## 👤 Admin Access

To access the admin panel, you need to set up an admin user. 
You can modify the `canAccessPanel` method in `app/Models/User.php` to allow specific emails, or create an admin user via tinker or seeder.

Example `User.php` modification:
```php
public function canAccessPanel(Panel $panel): bool
{
    // return $this->email == 'admin@example.com';
    return true; // CAUTION: Allows everyone in local dev
}
```

Access admin panel at: `http://localhost:8000/admin`

## 📁 Project Structure

```
ecommerce_filament/
├── app/
│   ├── Filament/              # Filament admin resources (Product, Order, etc.)
│   ├── Helpers/               # Helper classes (e.g., CartManagement)
│   ├── Livewire/              # Livewire components (Frontend logic)
│   ├── Models/                # Eloquent models
│   └── Mail/                  # Mail classes
├── database/
│   ├── migrations/            # Database migrations
│   └── seeders/               # Database seeders
├── public/
│   ├── front-assets/          # Static frontend assets (images)
│   └── storage/               # Symlinked storage
├── resources/
│   ├── views/
│   │   ├── livewire/          # Blade templates for Livewire components
│   │   ├── invoices/          # PDF Invoice templates
│   │   └── mail/              # Email templates
├── routes/
│   └── web.php                # Web routes
└── tailwind.config.js         # Tailwind configuration
```

## 🔑 Key Components

### Livewire Pages (Frontend)
- **HomePage**: Layout with Hero, Brand, Category, Product, and Review sections.
- **ProductsPage**: Grid view of products with sidebar filters.
- **ProductDetailPage**: Individual product view.
- **CartPage**: Cart management interface.
- **CheckoutPage**: Order placement and payment.
- **MyOrdersPage**: User order history.

### Filament Resources (Admin)
- **ProductResource**: Manage catalog.
- **OrderResource**: Manage orders & shipments.
- **CategoryResource** / **BrandResource**: Taxonomies.
- **UserResource**: Customer management.

## 🧪 Testing

```bash
php artisan test
```

## 📝 Scheduled Tasks

The application includes automated sitemap generation:
```bash
# Run manually
php artisan sitemap:generate
# Scheduled daily at 2 AM
```

## 🤝 Contributing

Contributions are welcome!
1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

**Ahasan**
- GitHub: [@Ahasan39](https://github.com/Ahasan39)

## 🙏 Acknowledgments

- [Laravel](https://laravel.com)
- [Filament](https://filamentphp.com)
- [Livewire](https://livewire.laravel.com)
- [Preline UI](https://preline.co)
- [Tailwind CSS](https://tailwindcss.com)

## 🗺️ Roadmap

- [ ] Dynamic Product Reviews & Ratings (Database driven)
- [ ] Wishlist functionality
- [ ] Multi-language support
- [ ] Advanced analytics dashboard
- [ ] Social media integration
- [ ] Inventory management (Advanced variants)
- [ ] Coupon system
- [ ] Newsletter subscription
