# مشروع Laravel مع Supabase

هذا المشروع يطبق عمليات CRUD الأساسية باستخدام Laravel و Supabase كقاعدة بيانات.

## المتطلبات

- PHP >= 8.1
- Composer
- PostgreSQL PHP Extension (php-pgsql)
- حساب Supabase

## إعداد المشروع

1.  **نسخ المستودع (أو فك ضغط الملف):**
    ```bash
    # إذا كان لديك مستودع git
    # git clone <repository_url>
    # cd supabase_laravel_project

    # إذا قمت بفك ضغط الملف
    # unzip supabase_laravel_project.zip
    # cd supabase_laravel_project
    ```

2.  **تثبيت الاعتماديات:**
    ```bash
    composer install
    ```

3.  **إعداد ملف البيئة:**
    - انسخ ملف `.env.example` إلى `.env`:
      ```bash
      cp .env.example .env
      ```
    - قم بتحديث متغيرات البيئة في ملف `.env` بمعلومات الاتصال بقاعدة بيانات Supabase الخاصة بك:
      ```
      DB_CONNECTION=pgsql
      DB_HOST=<your_supabase_host> # مثل: aws-0-us-east-2.pooler.supabase.com
      DB_PORT=<your_supabase_port> # مثل: 5432
      DB_DATABASE=<your_supabase_db_name> # مثل: postgres
      DB_USERNAME=<your_supabase_username> # مثل: postgres.fgphkcsdobctqzsgljpu
      DB_PASSWORD=<your_supabase_password>
      ```
    - **ملاحظة:** لقد تم تزويدك ببيانات الاتصال هذه مسبقاً، قم بإدخالها هنا.

4.  **إنشاء مفتاح التطبيق:**
    ```bash
    php artisan key:generate
    ```

5.  **تشغيل الترحيل (Migrations):**
    ```bash
    php artisan migrate
    ```
    *ملاحظة:* قد يظهر خطأ بخصوص جدول `personal_access_tokens` إذا كان موجوداً مسبقاً في قاعدة بياناتك. هذا لا يؤثر على جداول المشروع الأساسية (attendees, attendee_events_searches, attendee_ticket_accesses).

## تشغيل الخادم

```bash
php artisan serve
```

سيتم تشغيل الخادم المحلي عادةً على `http://127.0.0.1:8000`.

## نقاط النهاية (API Endpoints)

يمكنك التفاعل مع الـ API باستخدام المسارات التالية (مع Prefex `/api`):

-   **Attendees:**
    -   `GET /api/attendees` (List all, paginated)
    -   `POST /api/attendees` (Create new)
    -   `GET /api/attendees/{attendee}` (Show specific)
    -   `PUT/PATCH /api/attendees/{attendee}` (Update specific)
    -   `DELETE /api/attendees/{attendee}` (Delete specific)
-   **Attendee Events Searches:**
    -   `GET /api/attendee-events-searches` (List all, paginated, optional `attendee_id` filter)
    -   `POST /api/attendee-events-searches` (Create new)
    -   `GET /api/attendee-events-searches/{attendeeEventsSearch}` (Show specific)
    -   `PUT/PATCH /api/attendee-events-searches/{attendeeEventsSearch}` (Update specific)
    -   `DELETE /api/attendee-events-searches/{attendeeEventsSearch}` (Delete specific)
-   **Attendee Ticket Accesses:**
    -   `GET /api/attendee-ticket-accesses` (List all, paginated, optional `attendee_id` filter)
    -   `POST /api/attendee-ticket-accesses` (Create new)
    -   `GET /api/attendee-ticket-accesses/{attendeeTicketAccess}` (Show specific)
    -   `PUT/PATCH /api/attendee-ticket-accesses/{attendeeTicketAccess}` (Update specific)
    -   `DELETE /api/attendee-ticket-accesses/{attendeeTicketAccess}` (Delete specific)

## توثيق Swagger (اختياري)

إذا تم إعداد Swagger (كما هو مطلوب في ملف PDF)، يمكنك الوصول إلى التوثيق التفاعلي عادةً عبر المسار `/api/documentation`.

*ملاحظة:* لم يتم تضمين إعداد Swagger في هذا التسليم الأولي حسب طلب التركيز على الواجهة الخلفية الأساسية والجداول الثلاثة.

