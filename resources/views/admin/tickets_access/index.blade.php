@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-white mb-4">Manage Ticket Access</h2>

    {{-- Create Form --}}
    <form method="POST" action="{{ route('tickets-access.store') }}" class="d-flex gap-2 mb-4">
        @csrf
        <select name="admin_id" class="form-control" required>
            <option value="">Select Admin</option>
            @foreach($admins as $admin)
                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
            @endforeach
        </select>
        <select name="event_id" class="form-control" required>
            <option value="">Select Event</option>
            @foreach($events as $event)
                <option value="{{ $event->id }}">{{ $event->name }}</option>
            @endforeach
        </select>
        <select name="ticket_id" class="form-control" required>
            <option value="">Select Ticket</option>
            @foreach($tickets as $ticket)
                <option value="{{ $ticket->id }}">{{ $ticket->type }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-purple">Add Access</button>
    </form>

    {{-- Table --}}
    <table class="table table-dark table-bordered text-white align-middle">
        <thead>
            <tr>
                <th>Admin</th>
                <th>Event</th>
                <th>Ticket</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accesses as $access)
            <tr>
                <td colspan="4">
                    <form method="POST" action="{{ route('tickets-access.store') }}" class="d-flex gap-2 align-items-center">
                        @csrf
                        <input type="hidden" name="id" value="{{ $access->id }}">

                        <select name="admin_id" class="form-control" required>
                            @foreach($admins as $admin)
                                <option value="{{ $admin->id }}" {{ $access->admin_id == $admin->id ? 'selected' : '' }}>{{ $admin->name }}</option>
                            @endforeach
                        </select>

                        <select name="event_id" class="form-control" required>
                            @foreach($events as $event)
                                <option value="{{ $event->id }}" {{ $access->event_id == $event->id ? 'selected' : '' }}>{{ $event->name }}</option>
                            @endforeach
                        </select>

                        <select name="ticket_id" class="form-control" required>
                            @foreach($tickets as $ticket)
                                <option value="{{ $ticket->id }}" {{ $access->ticket_id == $ticket->id ? 'selected' : '' }}>{{ $ticket->type }}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </form>

                    <form action="{{ route('tickets-access.destroy', $access->id) }}" method="POST" style="display:inline-block;" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this access?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
