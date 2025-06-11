@extends('layouts.app')
<div id="admin-root"></div>

@viteReactRefresh
@vite('resources/js/main.jsx')

@section('content')
<div class="container">
    <h2 class="mb-4">Manage Admins</h2>

    <!-- Add Admin Form -->
    <form action="{{ route('admins.store') }}" method="POST" class="row g-3 mb-4">
        @csrf
        <div class="col-md-4">
            <input type="text" name="name" class="form-control" placeholder="Name" required>
        </div>
        <div class="col-md-4">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="col-md-4">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Add Admin</button>
        </div>
    </form>

    <!-- Admins Table -->
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th style="width: 180px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <form action="{{ route('admins.update', $admin->admin_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td><input type="text" name="name" value="{{ $admin->name }}" class="form-control" required></td>
                        <td><input type="email" name="email" value="{{ $admin->email }}" class="form-control" required></td>
                        <td>
                            <button class="btn btn-sm btn-success">Update</button>
                    </form>
                            <form action="{{ route('admins.destroy', $admin->admin_id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this admin?')">Delete</button>
                            </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
