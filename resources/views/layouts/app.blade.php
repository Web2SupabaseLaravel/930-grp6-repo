<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: white;
        }
        .sidebar {
            height: 100vh;
            background-color: #1f1f1f;
            padding: 1rem;
        }
        .sidebar a {
            color: #aaa;
            text-decoration: none;
            display: block;
            padding: 0.5rem 0;
        }
        .sidebar a:hover {
            color: #a259ff;
        }
        .navbar-custom {
            background-color: #1a1a1a;
        }
        .btn-primary {
            background-color: #a259ff;
            border-color: #a259ff;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar">
        <h4 class="text-white mb-4">my Ticket</h4>
        <a href="#">dashboard</a>
        <a href="#">tickets</a>
        <a href="#">organizers</a>
        <a href="#">events</a>
    </div>

    <div class="flex-grow-1">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-4">
            <div class="container-fluid">
                <form class="d-flex me-auto">
                    <input class="form-control me-2" type="search" placeholder="search" aria-label="Search">
                </form>
                <button class="btn btn-primary me-3">sign up</button>
                <i class="bi bi-bell text-white me-3"></i>
                <span class="text-white">user</span>
            </div>
        </nav>

        <main class="container py-4">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
