# API Documentation for Event Admin Management

## Overview

This API handles admin accounts and their dashboards in an event management system. Admins are stored in a unified `users` table, and linked to their individual `admin_dashboard` records.

## Base URL

```
http://localhost:8000/api
```

## Authentication

Currently: **No authentication** required (public access for development).  
Future plan: Use **Bearer Tokens** via Laravel Sanctum or Passport.

## Rate Limiting

No rate limits currently applied.

## Error Handling

| Status Code | Description               |
|-------------|---------------------------|
| 200         | Success                   |
| 201         | Created                   |
| 400         | Bad Request               |
| 401         | Unauthorized              |
| 404         | Not Found                 |
| 422         | Validation Error          |
| 500         | Internal Server Error     |

## Available Resources

- [Admins](./admins.md)
- [Admin Dashboards](./admin-dashboards.md)
