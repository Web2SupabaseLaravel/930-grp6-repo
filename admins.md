# Admins API

Manage admin users (stored in `users` table with role = 'admin').

---

## GET `/api/admins`

**Description:** List all admins with their dashboards

### Response Example:
```json
[
  {
    "id": 1,
    "name": "Super Admin",
    "email": "admin@event.com",
    "role": "admin",
    "dashboard": {
      "id": 1,
      "admin_id": 1,
      "revenue": 15000,
      "registration_demographics": {
        "18-25": 20,
        "26-35": 10
      },
      "created_at": "2024-05-18T10:00:00Z"
    }
  }
]
```

---

## GET `/api/admins/{id}`

**Description:** Get a specific admin with dashboard

### Response Example:
```json
{
  "id": 1,
  "name": "Super Admin",
  "email": "admin@event.com",
  "role": "admin",
  "dashboard": {
    "revenue": 15000,
    "registration_demographics": {
      "18-25": 20,
      "26-35": 10
    }
  }
}
```

### Error Example:
```json
{
  "message": "No query results for model [User]"
}
```
