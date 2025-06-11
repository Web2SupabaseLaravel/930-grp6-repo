# 📦 Event Management System

This project is a **Laravel + Supabase**-based event management system built as part of a graduation project.

## 🚀 Features

- 🔐 User authentication & admin roles
- 📅 Event creation and management
- 🎟 Ticket type assignment (Regular, VIP)
- ✅ Admin ticket access management
- 👤 Human access management
- 📊 Single-page CRUD interfaces for efficiency

## 🛠 Tech Stack

- **Backend**: Laravel 10+
- **Database**: Supabase (PostgreSQL)
- **UI**: Blade + Bootstrap 5
- **Version Control**: GitHub

## 📁 Folder Structure

```
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
│   └── views/
│       └── admin/
│           ├── humans/
│           └── tickets_access/
├── routes/
│   └── web.php
└── ...
```

## 🧪 How to Run Locally

```bash
# Install dependencies
composer install

# Copy and configure .env
cp .env.example .env
php artisan key:generate

# Set up DB connection in .env (Supabase credentials)
# Run the server
php artisan serve
```

## 🌐 Deployment
This project can be deployed using platforms like **Render**, **Railway**, or **VPS (DigitalOcean)**.

## 📷 Screenshots
Include screenshots of:
- Login page
- Manage Humans
- Manage Tickets Access

## 🧑‍💻 Contributors
- 👨‍💻 Anas Assi (anas-project branch)
- 🎓 Web2SupabaseLaravel Group 6

---

> For any questions, feel free to reach out or fork and explore the repo. Good luck! 🎉
