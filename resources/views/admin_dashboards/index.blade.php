@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Admin Dashboards</h2>
    <a href="{{ route('admin_dashboards.create') }}" class="btn btn-primary mb-3">Add New Dashboard</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">Dashboards List</div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Dashboard</th>
                        <th>Event Registrations</th>
                        <th>Revenue</th>
                        <th>Attendee Demographics</th>
                        <th>Admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dashboards as $dashboard)
                    <tr>
                        <td>{{ $dashboard->dashboard }}</td>
                        <td>{{ $dashboard->event_registrations }}</td>
                        <td>{{ $dashboard->revenue }}</td>
                        <td>{{ $dashboard->attendee_demographics }}</td>
                        <td>{{ $dashboard->admin->name ?? 'N/A' }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin_dashboards.edit', $dashboard) }}" class="btn btn-success btn-sm me-2">Edit</a>
                            <form action="{{ route('admin_dashboards.destroy', $dashboard) }}" method="POST">
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
