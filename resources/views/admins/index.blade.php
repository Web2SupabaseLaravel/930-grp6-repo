@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Admin Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header">Add New Admin</div>
        <div class="card-body">
            <form action="{{ route('admins.store') }}" method="POST" class="row g-3">
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
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">Add Admin</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Admins List</div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <form action="{{ route('admins.update', $admin) }}" method="POST">
                            @csrf @method('PUT')
                            <td><input type="text" name="name" value="{{ $admin->name }}" class="form-control"></td>
                            <td><input type="email" name="email" value="{{ $admin->email }}" class="form-control"></td>
                            <td class="d-flex">
                                <button type="submit" class="btn btn-success btn-sm me-2">Update</button>
                        </form>
                        <form action="{{ route('admins.destroy', $admin) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
