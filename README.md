<p align="center">
  <img src="public/favicon.ico" width="400">
</p>
<h1 align="center"><b>Softer</b></h1>

# About Softer

**Softer** is my **Bachelor’s project** — a Laravel PHP web application designed for creating websites and mobile applications.  

The platform allows users to **request a website or mobile app**, while developers on the backend can **accept projects, update progress, and share the current version** with the user. Users can **track the status**, request **changes**, or add new features. Developers can share the current design and functionality via a **live link** showing the ongoing work.

---

## Features

- User registration and authentication
- Project request system for websites and mobile apps
- Developer dashboard to manage and accept projects
- Project status tracking for users
- Requesting changes and feature updates
- Live preview links for ongoing projects

---

## Technologies Used

- **Backend:** PHP 7.4, Laravel 7
- **Frontend:** Blade templates, Bootstrap/AdminLTE
- **Database:** MySQL
- **Version Control:** Git/GitHub

---

## Installation & Setup

Follow these steps to run the project locally:

### 1. Clone the repository
```bash
git clone https://github.com/salmasalehk797/BachlorGP-Softer.git

cd BachlorGP-Softer
```

### 2. Install PHP dependencies
```bash
composer install
```

### 3. Set up environment
- Copy the example .env file:
```bash
cp .env.example .env
```
- Update .env with your database credentials.
- Generate the application key:
```bash
php artisan key:generate
```

### 4. Run database migrations
```bash
php artisan migrate
```

### 5. Serve the application
```bash
php artisan serve
```
- Open your browser and go to: http://127.0.0.1:8000

# Author
## Salma Saleh
Bachelor Project – Laravel Web Application
