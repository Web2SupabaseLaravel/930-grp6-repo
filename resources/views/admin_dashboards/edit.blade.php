@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Admin Dashboard</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin_dashboards.update', $admin_dashboard) }}" method="POST" class="row g-3">
                @csrf @method('PUT')
                <div class="col-md-6">
                    <input type="text" name="dashboard" class="form-control" value="{{ $admin_dashboard->dashboard }}" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="event_registrations" class="form-control" value="{{ $admin_dashboard->event_registrations }}" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="revenue" class="form-control" value="{{ $admin_dashboard->revenue }}" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="attendee_demographics" class="form-control" value="{{ $admin_dashboard->attendee_demographics }}" required>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success">Update Dashboard</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
