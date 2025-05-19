# 🎟️ Admin Ticket Accesses API

إدارة صلاحيات وصول المدراء للتذاكر.

## GET /api/admin-ticket-accesses
إرجاع كل العلاقات.

### Response
```json
[
  {
    "id": 1,
    "admin_id": 1,
    "ticket_id": 3,
    "created_at": "2024-05-20T12:00:00Z",
    "updated_at": "2024-05-20T12:00:00Z"
  }
]
```

## POST /api/admin-ticket-accesses
إنشاء علاقة جديدة.

### Request Body
```json
{
  "admin_id": 1,
  "ticket_id": 3
}
```

## PUT /api/admin-ticket-accesses/{id}
تحديث العلاقة.

### Request Body
```json
{
  "ticket_id": 4
}
```

## DELETE /api/admin-ticket-accesses/{id}
حذف العلاقة.