@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Create Admin Dashboard</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin_dashboards.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <input type="text" name="dashboard" class="form-control" placeholder="Dashboard Name" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="event_registrations" class="form-control" placeholder="Event Registrations" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="revenue" class="form-control" placeholder="Revenue" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="attendee_demographics" class="form-control" placeholder="Attendee Demographics" required>
                </div>
                <div class="col-md-6">
                    <select name="admin_id" class="form-control" required>
                        @foreach($admins as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">Create Dashboard</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
