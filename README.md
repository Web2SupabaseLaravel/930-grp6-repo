
# Event Management System API Documentation

## Overview
This Laravel-based API allows you to manage admins and admin dashboards, covering full CRUD operations.

## Table of Contents
- Setup Instructions
- API Endpoints
  - Admin Management
  - Admin Dashboards
- Usage Examples

## Setup Instructions
1. Clone the repository:
   ```
   git clone https://github.com/Web2SupabaseLaravel/930-grp6-repo.git
   ```
2. Install dependencies:
   ```
   composer install
   ```
3. Configure .env:
   ```
   cp .env.example .env
   php artisan key:generate
   ```
4. Run migrations:
   ```
   php artisan migrate
   ```
5. Serve the app:
   ```
   php artisan serve
   ```

## API Endpoints

### Admin Management
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /admins | List all admins |
| POST | /admins | Create a new admin |
| PUT | /admins/{id} | Update an admin |
| DELETE | /admins/{id} | Delete an admin |

### Admin Dashboards
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /admin_dashboards | List all dashboards |
| POST | /admin_dashboards | Create a new dashboard |
| PUT | /admin_dashboards/{id} | Update a dashboard |
| DELETE | /admin_dashboards/{id} | Delete a dashboard |

## Usage Examples

### Create Admin
```
POST /admins
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123"
}
```

### Create Admin Dashboard
```
POST /admin_dashboards
{
  "dashboard": "Event Summary",
  "event_registrations": "150",
  "revenue": "$2000",
  "attendee_demographics": "Young Adults",
  "admin_id": 1
}
```

