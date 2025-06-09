# Instructions Manuals Web Application

A Laravel-based web application that allows users to search, read, download, and upload instruction manuals for various devices.

## Features

### User Features
- Search for manuals by device name
- View and download found manuals
- Submit complaints about manuals
- Register account (with CAPTCHA verification)
- Upload new manuals (pending admin approval)

### Admin Features
- Manage manuals (add/edit/delete)
- Approve/reject user-uploaded manuals
- Manage users (add/delete/ban/unban)

## Technologies Used
- Laravel 12 (PHP framework)
- MySQL (database)
- Tailwind CSS (styling)
- Vite (asset bundling)
- Laravel Breeze (authentication)

## Installation

1. Clone the repository:
```bash
git clone [repository-url]
cd instructions-manuals
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Configure environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Set up database:
- Create MySQL database
- Update `.env` with database credentials
```bash
php artisan migrate --seed
```

5. Build assets:
```bash
npm run build
```

6. Start development server:
```bash
php artisan serve
```
## Default Admin user
- Email : admin@example.com
- Password : password

