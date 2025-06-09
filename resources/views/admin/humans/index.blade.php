@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-white mb-4">Manage Humans</h2>

    {{-- Create Form --}}
    <form method="POST" action="{{ route('humans.store') }}" class="d-flex gap-2 mb-4">
        @csrf
        <input type="text" name="name" placeholder="Name" class="form-control" required>
        <input type="email" name="email" placeholder="Email" class="form-control" required>
        <input type="text" name="phone" placeholder="Phone" class="form-control" required>
        <button type="submit" class="btn btn-purple">Add Human</button>
    </form>

    {{-- Table --}}
    <table class="table table-dark table-bordered text-white align-middle">
        <thead>
            <tr>
                <th style="width: 25%">Name</th>
                <th style="25%">Email</th>
                <th style="25%">Phone</th>
                <th style="25%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($humans as $human)
            <tr>
                <td colspan="4">
                    <form method="POST" action="{{ route('humans.store') }}" class="d-flex gap-2 align-items-center">
                        @csrf
                        <input type="hidden" name="id" value="{{ $human->id }}">
                        <input type="text" name="name" class="form-control" value="{{ $human->name }}" required>
                        <input type="email" name="email" class="form-control" value="{{ $human->email }}" required>
                        <input type="text" name="phone" class="form-control" value="{{ $human->phone }}" required>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </form>
                    <form action="{{ route('humans.destroy', $human->id) }}" method="POST" style="display:inline-block;" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this human?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
