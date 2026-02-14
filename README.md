# Coalition Task Manager

A simple project and task management app built with **Laravel 12**, **Tailwind CSS 4**, and **Vite**. Create projects, add tasks with priorities and statuses, and reorder them via drag-and-drop.

---

## Requirements

- PHP >= 8.3
- Composer
- Node.js & npm
- MySQL

---

## Installation

- Extract the files from the zip file
- Make a copy of the .env.example file and name it .env
- Define the database credentials in the .env file
- Install the dependencies with `composer install`
- Generate the app key with `php artisan key:generate`
- Run the migrations with `php artisan migrate`
- Install the front-end dependencies with `npm install`
- Run the app with `composer dev` which starts both the server and vite at once
- If you want to run them individually, use the following commands:

```bash
# Terminal 1 – Laravel server
php artisan serve

# Terminal 2 – Vite dev server
npm run dev
```

## Packages

- **Packages:** `vinkla/hashids` (URL obfuscation), `afubasic/laravel-utilities` (To add the `php artisan make:action` command)
