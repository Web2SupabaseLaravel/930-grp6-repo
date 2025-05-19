# 📘 API Documentation for Admin Management API

## Overview
This API provides tools for managing the relationship between managers, users, and tickets in an administrative system using Laravel.

## Base URL
```
http://localhost:8000/api
```

## Authentication
Use a Bearer Token in the header:
```
Authorization: Bearer {your_token}
```

## Rate Limiting
There are currently no restrictions.

## Error Handling
- 200: Success
- 201: Created
- 401: Unauthorized
- 404: Not Found
- 422: Validation Error
- 500: Server Error

## Available Resources
- [Admin Human Manages](admin_human_manages.md)
- [Admin Ticket Accesses](admin_ticket_accesses.md)
