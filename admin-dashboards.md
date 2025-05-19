# Admin Dashboard API

Manage dashboards that track admin statistics and metrics.

---

## GET `/api/admin-dashboards`

**Description:** List all dashboards with their corresponding admins

### Response Example:
```json
[
  {
    "id": 1,
    "admin_id": 1,
    "revenue": 25000,
    "registration_demographics": {
      "18-25": 40,
      "26-35": 15
    },
    "admin": {
      "id": 1,
      "name": "Super Admin",
      "email": "admin@event.com"
    }
  }
]
```

---

## POST `/api/admin-dashboards`

**Description:** Create a new admin dashboard

### Headers:

| Key           | Value              |
|---------------|--------------------|
| Content-Type  | application/json   |

### Request Body:
```json
{
  "admin_id": 1,
  "revenue": 25000,
  "registration_demographics": {
    "18-25": 40,
    "26-35": 15
  }
}
```

### Success Response:
```json
{
  "id": 1,
  "admin_id": 1,
  "revenue": 25000,
  "registration_demographics": {
    "18-25": 40,
    "26-35": 15
  }
}
```

### Validation Error:
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "admin_id": ["The admin_id field is required."]
  }
}
```
