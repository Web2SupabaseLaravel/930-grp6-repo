# 👤 Admin Human Manages API

إدارة العلاقة بين المدراء والمستخدمين.

## GET /api/admin-human-manages
إرجاع كل العلاقات.

### Response
```json
[
  {
    "id": 1,
    "admin_id": 2,
    "user_id": 5,
    "created_at": "2024-05-20T12:00:00Z",
    "updated_at": "2024-05-20T12:00:00Z"
  }
]
```

## POST /api/admin-human-manages
إنشاء علاقة جديدة.

### Request Body
```json
{
  "admin_id": 2,
  "user_id": 5
}
```

## PUT /api/admin-human-manages/{id}
تحديث العلاقة.

### Request Body
```json
{
  "admin_id": 3
}
```

## DELETE /api/admin-human-manages/{id}
حذف العلاقة.