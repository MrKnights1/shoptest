# TechHub - E-Commerce Platform

A modern e-commerce platform built with Laravel 11, featuring complete product management, shopping cart, checkout, and admin panel with **multi-language support** (Estonian, English, Russian).

## Features

**Customer Features:**
- Browse products with search and category filtering
- Shopping cart and secure checkout
- Order history and tracking
- Multi-language interface (ET/EN/RU)
- Support pages (Contact, FAQ, Shipping, Returns)

**Admin Features:**
- Dashboard with statistics and analytics
- Product & category management with auto-translation
- Order management with status updates
- Low stock alerts

## Tech Stack

- **Framework:** Laravel 11
- **Authentication:** Laravel Breeze
- **Database:** MySQL
- **Frontend:** Blade Templates + Tailwind CSS + Vite
- **Languages:** Estonian (default), English, Russian

## Installation

### Prerequisites

- PHP 8.2+
- Composer
- MySQL 8.0+
- Node.js 18+ & npm

### Step-by-Step Setup

1. **Clone the repository**
   ```bash
   cd /root/muud/shoptest
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Create MySQL database**
   ```bash
   mysql -u root -p
   ```
   ```sql
   CREATE DATABASE ecommerce_shop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   EXIT;
   ```

5. **Configure environment**

   Copy `.env.example` to `.env` if needed, or verify `.env` has these settings:
   ```env
   APP_NAME="TechHub"
   APP_URL=http://localhost:8000
   APP_LOCALE=et

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ecommerce_shop
   DB_USERNAME=root
   DB_PASSWORD=Passw0rd
   ```

6. **Generate application key** (if not already set)
   ```bash
   php artisan key:generate
   ```

7. **Run database migrations and seeders**
   ```bash
   php artisan migrate:fresh --seed
   ```

   This creates:
   - 8 product categories (Laptops, Smartphones, Audio, Gaming, Smart Home, Cameras, Wearables, Accessories)
   - 26 sample products with realistic tech items
   - Admin user account
   - All translation keys in 3 languages

8. **Build frontend assets**
   ```bash
   npm run build
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

10. **Visit the application**

    Open your browser: **http://localhost:8000**

## Default Admin Credentials

```
Email: admin@shop.com
Password: Admin@123
```

Access admin panel at: **http://localhost:8000/admin/dashboard**

## Currency & Date Format

- **Currency:** Euros (€)
- **Date Format:** Estonian format (e.g., "26. oktoober 2025 11:47")
- **Locale:** Estonian (et) by default, switchable to English/Russian

## Multi-Language System

### Auto-Translation Command

The application includes an auto-translation command that uses Google Translate to translate all language keys:

```bash
# Translate from Estonian (default) to English and Russian
php artisan translate:auto

# Translate from specific language
php artisan translate:auto --source=en --targets=et,ru
```

### Category Translation

When creating categories in the admin panel:
1. Enter category name in Estonian (or any language)
2. System automatically:
   - Generates translation key (e.g., `category.laptops`)
   - Translates to English and Russian using Google Translate
   - Stores in database and updates language files
   - Clears cache for immediate availability

**No manual translation needed!** Categories are instantly available in all 3 languages.

### How It Works

- Categories stored with keys like `category.laptops`
- Translation files: `lang/et/shop.php`, `lang/en/shop.php`, `lang/ru/shop.php`
- Automatic fallback to original name if translation missing
- Dates localized using Carbon's `translatedFormat()`

## Key Routes

### Customer
- `/` - Homepage
- `/products` - Product catalog
- `/products/{id}` - Product details
- `/cart` - Shopping cart
- `/checkout` - Checkout
- `/orders` - Order history
- `/contact`, `/faq`, `/shipping`, `/returns` - Support pages

### Admin
- `/admin/dashboard` - Dashboard
- `/admin/products` - Product management
- `/admin/categories` - Category management
- `/admin/orders` - Order management

## Development Commands

```bash
# Run development server
php artisan serve

# Watch and rebuild assets (in separate terminal)
npm run dev

# Clear all caches
php artisan cache:clear && php artisan config:clear && php artisan view:clear

# Reset database with fresh data
php artisan migrate:fresh --seed

# Auto-translate language files
php artisan translate:auto
```

## Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/              # Admin controllers
│   │   ├── CartController.php
│   │   ├── CheckoutController.php
│   │   ├── HomeController.php
│   │   ├── OrderController.php
│   │   └── ProductController.php
│   ├── Models/                 # Eloquent models
│   └── Providers/
│       └── AppServiceProvider.php  # Sets Estonian locale for Carbon
├── database/
│   ├── migrations/             # Database schema
│   └── seeders/               # Data seeders
├── lang/
│   ├── et/                    # Estonian translations
│   ├── en/                    # English translations
│   └── ru/                    # Russian translations
├── resources/
│   └── views/
│       ├── admin/             # Admin panel views
│       ├── cart/              # Shopping cart
│       ├── checkout/          # Checkout
│       ├── orders/            # Orders
│       ├── products/          # Products
│       └── layouts/           # Layout templates
└── routes/
    ├── web.php                # Web routes
    └── auth.php               # Authentication routes
```

## Database Schema

- **users** - Customer and admin accounts
- **categories** - Product categories (translation keys)
- **products** - Product catalog
- **addresses** - Customer shipping addresses
- **cart_items** - Shopping cart items
- **orders** - Customer orders
- **order_items** - Order line items

## Security Features

✅ Password hashing (bcrypt with 12 rounds)
✅ CSRF protection on all forms
✅ SQL injection prevention (Eloquent ORM)
✅ Input validation on all requests
✅ Admin route protection (middleware)
✅ Secure session management
✅ Stock validation before checkout
✅ Database transactions for orders

## Troubleshooting

### Database Connection Error
```bash
# Check MySQL is running
sudo systemctl status mysql

# Verify database exists
mysql -u root -p -e "SHOW DATABASES;"

# Check .env credentials match MySQL user
```

### Translation Cache Issues
```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Categories Show as "shop.category.xxx"
```bash
# Run auto-translation
php artisan translate:auto

# Clear caches
php artisan cache:clear
```

### Assets Not Loading
```bash
# Rebuild assets
npm run build

# For development with hot reload
npm run dev
```

### Port Already in Use
```bash
# Use different port
php artisan serve --port=8001
```

## Quick Test Guide

1. **Register Account:** Click "Sign Up" → Create account
2. **Browse Products:** View homepage → Click "All Products"
3. **Add to Cart:** Select product → Set quantity → "Add to Cart"
4. **Checkout:** Cart → "Proceed to Checkout" → Fill address → Place order
5. **View Orders:** "My Orders" in navigation
6. **Admin Panel:** Login as admin → Visit `/admin/dashboard`
7. **Create Category:** Admin → Categories → Add New → Auto-translates!
8. **Manage Orders:** Admin → Orders → Update status

## License

Open-source software licensed under the MIT license.
