# Laravel 11 Client Portal / Case Management System

A SaaS-style dashboard built with Laravel 11 for clients and admins to collaborate on case workflows.

## Features

- Authentication (register, login, password reset)
- Role-based access with **Admin** and **Client** roles (Spatie Permission)
- Client dashboard (`/dashboard`) with cases, tasks, and uploads
- Admin dashboard (`/admin`) for users, cases, documents, and task assignment
- Document upload and secure download
- Case status workflow: Pending, In Review, Documents Needed, Approved, Rejected
- TailwindCSS + Alpine.js responsive dashboard layout

## Tech Stack

- Laravel 11
- Laravel Breeze
- TailwindCSS
- Alpine.js
- MySQL
- Laravel Storage (`storage/app/documents`)
- Spatie Laravel Permission

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
php artisan serve
```

## Environment setup

1. Configure your DB credentials in `.env`.
2. Ensure `APP_URL` and mail settings are correct for your local environment.
3. Run storage link if needed:

```bash
php artisan storage:link
```

## Database migration and seeding

```bash
php artisan migrate --seed
```

Seeders create:
- Roles (`admin`, `client`)
- Default admin user
- Sample client data with cases, documents, tasks, and notifications

## Running the server

```bash
php artisan serve
```

Then open `http://127.0.0.1:8000`.
