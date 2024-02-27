# Laravel E-Commerce

Welcome to our cutting-edge Laravel 10 e-commerce platform, where innovation meets seamless shopping experiences. Crafted with precision and powered by the latest technologies, our website brings together the best of HTML, CSS, Bootstrap, jQuery, and AJAX to deliver an unparalleled online shopping journey.

## Key Features:
### 1. Distinct User Experiences:
+ Separate login interfaces for both admin and users, ensuring tailored experiences for each.
+ Streamlined Google login integration for user convenience and security.

### 2. Robust Admin Dashboard:
+ Empowered with Bootstrap, jQuery, and AJAX, our admin dashboard offers comprehensive control over every aspect of the website.
+ Admin privileges include the ability to manage products, categories, brands, coupons, roles, settings, and more, with ease.

### 3. Efficient Order Management:
+ Admins can effortlessly handle order statuses, ensuring timely updates for customers via email notifications.
+ Seamless integration of Bangladeshi payment gateways simplifies transactions and enhances user trust.

### 4. Enhanced Frontend Functionality:
+ Users can add products to their wishlist and cart, facilitating easy browsing and purchasing decisions.
+ Secure order placement requires user authentication, enhancing transaction security.

### 5. Intuitive Product Navigation:
+ Users can explore products by category, sub-category, and brand, facilitating effortless discovery.
+ AJAX implementation ensures smooth updates to cart items, including quantity, color, and size changes.

Experience the future of online shopping with our Laravel-powered e-commerce platform. Join us on this journey and redefine your shopping experience today!


## Installation

Follow these steps to get the Laravel project up and running on your local machine.

### Prerequisites

Make sure you have the following installed:

- PHP >= 7.4
- Composer
- Node.js (for frontend assets compilation)
- npm (Node Package Manager)

### Step 1: Clone the repository

Clone the repository to your local machine using Git:

```bash
git clone https://github.com/Alamin934/laravel-advance-ecommerce.git
```

### Step 2: Install PHP dependencies
Navigate to the project directory and install PHP dependencies using Composer:

```bash
cd your_repository
composer install
```

### Step 3: Set up environment variables
Copy the .env.example file to .env:

```
cp .env.example .env
```
Edit the .env file and provide your environment-specific configuration like database connection, app key, etc.


### Step 4: Generate application key
Generate a unique application key:
```
php artisan key:generate
```

### Step 5: Run database migrations and seeders
Run database migrations to create necessary tables:
```
php artisan migrate
```

Optionally, you can seed the database with some sample data:
```
php artisan db:seed
```

### Step 6: Install frontend dependencies
If your project includes frontend assets like JavaScript or CSS, install Node.js dependencies:
```
npm install
```

### Step 7: Compile frontend assets
Compile assets such as JavaScript and CSS:
```
npm run dev
```


### Step 8: Serve the application
You can use Laravel's built-in server to run the application:
```
php artisan serve
```
By default, the application will be available at http://localhost:8000.



