@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-white">Manage Dashboards</h2>

    <!-- Add Dashboard Form -->
    <form action="{{ route('admin_dashboards.store') }}" method="POST" class="row g-3 mb-4">
        @csrf
        <div class="col-md-3">
            <input type="text" name="dashboard" class="form-control" placeholder="Dashboard" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="event_registrations" class="form-control" placeholder="Event Registrations" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="revenue" class="form-control" placeholder="Revenue" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="attendee_demographics" class="form-control" placeholder="Demographics" required>
        </div>
        <div class="col-md-4">
            <select name="admin_id" class="form-select" required>
                <option value="">Select Admin</option>
                @foreach($admins as $admin)
                    <option value="{{ $admin->admin_id }}">{{ $admin->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Add Dashboard</button>
        </div>
    </form>

    <!-- Dashboard Table -->
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th>Dashboard</th>
                <th>Event Reg</th>
                <th>Revenue</th>
                <th>Demographics</th>
                <th>Admin</th>
                <th style="width: 180px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dashboards as $dashboard)
                <tr>
                    <form action="{{ route('admin_dashboards.update', $dashboard->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td><input type="text" name="dashboard" value="{{ $dashboard->dashboard }}" class="form-control" required></td>
                        <td><input type="text" name="event_registrations" value="{{ $dashboard->event_registrations }}" class="form-control" required></td>
                        <td><input type="text" name="revenue" value="{{ $dashboard->revenue }}" class="form-control" required></td>
                        <td><input type="text" name="attendee_demographics" value="{{ $dashboard->attendee_demographics }}" class="form-control" required></td>
                        <td>
                            <select name="admin_id" class="form-select" required>
                                @foreach($admins as $admin)
                                    <option value="{{ $admin->admin_id }}" {{ $dashboard->admin_id == $admin->admin_id ? 'selected' : '' }}>
                                        {{ $admin->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-success">Update</button>
                    </form>

                    <form action="{{ route('admin_dashboards.destroy', $dashboard->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this dashboard?')">Delete</button>
                    </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
