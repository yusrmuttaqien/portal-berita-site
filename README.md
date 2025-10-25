<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project

Mini Portal Berita is a lightweight news portal application built with the Laravel framework. This application serves as a simple platform for publishing and managing news articles with a clean, user-friendly interface. The project demonstrates modern web development practices using Laravel.

Key features include:
- News article management
- Admin panel for content management
- Search and categorization functionality
- User authentication and authorization

## Academic Context

This project was developed as part of Team Assignment 3 for Advanced in Data and Information Management course at Binus Online.

## How To Get Started

### Prerequisites
- PHP 8.2 or higher
- Composer (PHP dependency manager)
- Node.js and npm (for frontend assets)
- SQLite, MySQL, or PostgreSQL database

### Installation Steps

0. **Fork the repository (optional)**

1. **Clone the repository**

   if forked:

   ```bash
   git clone https://github.com/your-username/mini-portal-berita.git
   ```

   if not:

   ```bash
   https://github.com/yusrmuttaqien/portal-berita-site.git
   ```

   then:

   ```bash
   cd mini-portal-berita
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Set up environment variables**
   ```bash
   cp .env.example .env
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Configure database**
   By default, the application uses SQLite. Create an empty database file:
   ```bash
   touch database/database.sqlite
   ```
   
   Or update the `.env` file with your preferred database configuration (MySQL/PostgreSQL).

6. **Run database migrations**
   ```bash
   php artisan migrate --seed
   ```

7. **Install and build frontend assets**
   ```bash
   npm install
   npm run build
   ```

8. **Create storage symlink for file access**
   ```bash
   php artisan storage:link
   ```
   
   This step is required to make uploaded files (like article thumbnails) accessible via web requests.

9. **Start the project**

   For viewing:

   ```bash
   php artisan serve
   ```

   For development:

    ```bash
    composer run dev
    ```

11. **Access the application**
    Open your browser and go to `http://localhost:8000`

### Alternative Setup Command
You can also use the setup script to perform all installation steps at once:

```bash
composer run setup
```

then continue from `step 9`.

### Additional Notes
- The default database connection uses SQLite for easy setup
- Admin credentials are created during seeding
- The application uses Laravel's built-in authentication system
- Frontend assets are built using Vite and Tailwind CSS

## Credits Group 3 - SBBF

- 2702386314 - STEVANUS PRASETYOKO
- 2702372486 - IMELDA ZAHWA ARACELLA
- 2702363885 - AIZAR RAHIMA SUPRAYITNO
- 2702386245 - ZAHRATUL UYUN
- 2702349666 - YUSRIL DHIYAUL HAQ MUTTAQIEN

## License

[MIT license](https://opensource.org/licenses/MIT).
