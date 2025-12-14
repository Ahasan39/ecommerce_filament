# 🛒 Ecommerce Filament - Laravel E-commerce Platform

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
<a href="https://github.com/laravel/framework"><img src="https://img.shields.io/badge/Laravel-10.x-red.svg" alt="Laravel Version"></a>
<a href="https://github.com/filamentphp/filament"><img src="https://img.shields.io/badge/Filament-3.x-orange.svg" alt="Filament Version"></a>
<a href="https://github.com/livewire/livewire"><img src="https://img.shields.io/badge/Livewire-3.x-pink.svg" alt="Livewire Version"></a>
<a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License"></a>
</p>

## 📋 About This Project

A modern, full-featured e-commerce platform built with Laravel 10, Filament 3, and Livewire 3. This application provides a complete online shopping experience with a powerful admin panel for managing products, orders, customers, and more.

### ✨ Key Features

#### 🎨 Frontend Features
- **Product Catalog**: Browse products with advanced filtering and sorting
- **Shopping Cart**: Real-time cart management with cookie-based persistence
- **User Authentication**: Complete auth system (Login, Register, Password Reset)
- **Guest Checkout**: Allow purchases without registration
- **Order Tracking**: Track order status and history
- **Product Search**: Fast and efficient product search
- **Categories & Brands**: Organized product navigation
- **Responsive Design**: Mobile-friendly interface
- **Payment Integration**: Stripe payment gateway & Cash on Delivery

#### 🔧 Admin Panel (Filament)
- **Dashboard**: Overview of sales, orders, and statistics
- **Product Management**: CRUD operations with image uploads
- **Order Management**: Process orders, update status, generate invoices
- **Customer Management**: View and manage customer accounts
- **Category & Brand Management**: Organize products efficiently
- **Page Management**: Create and manage custom pages
- **Invoice Generation**: PDF invoice creation and download
- **Courier Integration**: Steadfast Courier API integration
- **Order Tracking**: Tracking code management
- **Weight Management**: Product weight and shipping calculations

#### 🚀 Advanced Features
- **Livewire Components**: Dynamic, reactive UI without page reloads
- **Email Notifications**: Order confirmation emails
- **Sitemap Generation**: Automated sitemap for SEO
- **Admin Middleware**: Secure admin access control
- **Cache Control**: Optimized performance
- **Guest Orders**: Support for non-registered users
- **Delivery Charge**: Automatic delivery fee calculation
- **Discount System**: Apply discounts to orders
- **Compare Prices**: Show original vs. sale prices
- **Product Weights**: Track product weights for shipping

## 🛠️ Tech Stack

- **Framework**: Laravel 10.x
- **Admin Panel**: Filament 3.x
- **Frontend**: Livewire 3.x
- **Database**: MySQL
- **Payment**: Stripe API
- **PDF Generation**: DomPDF
- **Courier**: Steadfast Courier API
- **Styling**: Tailwind CSS
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

# Mail Configuration
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

7. **Seed the database (optional)**
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

To access the admin panel, you need to set up an admin user. Update the `canAccessPanel` method in `app/Models/User.php`:

```php
public function canAccessPanel(Panel $panel): bool
{
    return $this->email == 'your-admin@email.com';
}
```

Or create an admin user and set `is_admin = 1` in the database.

Access admin panel at: `http://localhost:8000/admin`

## 📁 Project Structure

```
ecommerce_filament/
├── app/
│   ├── Console/Commands/      # Custom artisan commands
│   ├── Filament/              # Filament admin resources
│   │   ├── Resources/         # CRUD resources
│   │   └── Widgets/           # Dashboard widgets
│   ├── Helpers/               # Helper classes (CartManagement)
│   ├── Http/
│   │   ├── Controllers/       # Controllers
│   │   └── Middleware/        # Custom middleware
│   ├── Livewire/              # Livewire components
│   ├── Mail/                  # Mail classes
│   └── Models/                # Eloquent models
├── database/
│   ├── migrations/            # Database migrations
│   └── seeders/               # Database seeders
├── public/
│   ├── front-assets/          # Frontend assets
│   └── storage/               # Public storage
├── resources/
│   ├── views/
│   │   ├── livewire/          # Livewire views
│   │   ├── invoices/          # Invoice templates
│   │   └── mail/              # Email templates
│   ├── css/                   # CSS files
│   └── js/                    # JavaScript files
└── routes/
    └── web.php                # Web routes
```

## 🔑 Key Components

### Models
- **User**: Customer and admin users
- **Product**: Product catalog
- **Category**: Product categories
- **Brand**: Product brands
- **Order**: Customer orders
- **OrderItem**: Order line items
- **Address**: Shipping addresses
- **Page**: Custom pages

### Livewire Components
- **HomePage**: Main landing page
- **ProductsPage**: Product listing with filters
- **ProductDetailPage**: Single product view
- **CartPage**: Shopping cart
- **CheckoutPage**: Checkout process
- **MyOrdersPage**: Customer order history
- **MyOrderDetailPage**: Order details
- **Auth Components**: Login, Register, Password Reset

### Filament Resources
- **ProductResource**: Manage products
- **OrderResource**: Manage orders
- **CategoryResource**: Manage categories
- **BrandResource**: Manage brands
- **UserResource**: Manage users
- **PageResource**: Manage custom pages

## 🎯 Features in Detail

### Cart Management
- Add/remove items
- Update quantities
- Cookie-based persistence
- Real-time total calculation

### Order Processing
1. Guest or authenticated checkout
2. Shipping information collection
3. Payment method selection (Stripe/COD)
4. Order confirmation email
5. Admin order management
6. Invoice generation
7. Courier integration

### Admin Features
- Dashboard with statistics
- Order status management
- Invoice generation (View/Download PDF)
- Steadfast courier integration
- Product weight tracking
- Delivery charge calculation
- Discount management
- Customer information

## 🔐 Security Features
- CSRF protection
- XSS prevention
- SQL injection protection
- Admin middleware
- Password hashing
- Secure payment processing

## 📧 Email Notifications
- Order confirmation
- Password reset
- Custom email templates

## 🌐 SEO Features
- Automated sitemap generation
- SEO-friendly URLs
- Meta tags support
- Robots.txt configuration

## 🚀 Performance Optimization
- Cache control middleware
- Lazy loading
- Image optimization
- Database query optimization
- Asset minification

## 📱 Responsive Design
- Mobile-first approach
- Tablet-friendly
- Desktop optimized
- Touch-friendly interface

## 🧪 Testing
```bash
php artisan test
```

## 📝 Scheduled Tasks

The application includes automated sitemap generation:

```bash
# Run manually
php artisan sitemap:generate

# Scheduled daily at 2 AM (configured in app/Console/Kernel.php)
```

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

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
- [Tailwind CSS](https://tailwindcss.com)
- [Stripe](https://stripe.com)

## 📞 Support

For support, email your-email@example.com or create an issue in the repository.

## 🗺️ Roadmap

- [ ] Multi-language support
- [ ] Wishlist functionality
- [ ] Product reviews and ratings
- [ ] Advanced analytics dashboard
- [ ] Social media integration
- [ ] Multiple payment gateways
- [ ] Inventory management
- [ ] Coupon system
- [ ] Newsletter subscription
- [ ] Live chat support

---

<p align="center">Made with ❤️ using Laravel & Filament</p>
