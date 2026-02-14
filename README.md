# Coalition Task Manager

A simple project and task management app built with **Laravel 12**, **Tailwind CSS 4**, and **Vite**. Create projects, add tasks with priorities and statuses, and reorder them via drag-and-drop.

---

## Requirements

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL

---

## Installation

Extract the files from the zip file
Make a copy of the .env.example file and name it .env
Define the database credentials in the .env file
Install the dependencies with `composer install`
Run the migrations with `php artisan migrate`
Install the front-end dependencies with `npm install`

# 2. Install PHP dependencies

composer install

# 3. Create your environment file

cp .env.example .env

# 4. Generate the app key

php artisan key:generate

# 5. Configure your database

# Open .env and set your MySQL credentials:

# DB_DATABASE=coalition

# DB_USERNAME=root

# DB_PASSWORD=

# 6. Run migrations

php artisan migrate

# 7. Install front-end dependencies

npm install

````

---

## Running the App

The easiest way is the built-in `dev` composer script, which starts the server, queue worker, log tail, and Vite all at once:

```bash
composer dev
````

Or run them individually:

```bash
# Terminal 1 – Laravel server
php artisan serve

# Terminal 2 – Vite dev server
npm run dev
```

Then visit **http://localhost:8000**.

---

## Quick Setup (one-liner)

```bash
composer setup    # installs deps, copies .env, generates key, runs migrations, builds assets
```

---

## Usage

| Action               | How                                                |
| -------------------- | -------------------------------------------------- |
| **Create a project** | Click "Create Project" on the home page            |
| **View tasks**       | Click "View" on any project                        |
| **Add a task**       | Inside a project, click "Create Task"              |
| **Edit / Delete**    | Use the links on each project or task card         |
| **Reorder tasks**    | Drag and drop tasks — order is saved automatically |
| **Switch projects**  | Use the project dropdown on the tasks page         |

---

## Running Tests

```bash
composer test
# or
php artisan test
```

---

## Tech Stack

- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Blade, Tailwind CSS 4, Vite, jQuery UI (drag-and-drop)
- **Database:** MySQL
- **Packages:** `vinkla/hashids` (URL obfuscation), `afubasic/laravel-utilities`
