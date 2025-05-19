# 📘 API Documentation for Admin Management API

## Overview
هذه الـ API توفّر أدوات لإدارة علاقة المدراء بالمستخدمين والتذاكر في نظام إداري باستخدام Laravel.

## Base URL
```
http://localhost:8000/api
```

## Authentication
استخدم Bearer Token في الهيدر:
```
Authorization: Bearer {your_token}
```

## Rate Limiting
لا يوجد قيود حالياً.

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