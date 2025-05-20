<!DOCTYPE html>
<html>
<head>
    <title>Organizers List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Organizers List</h2>
        <a href="{{ route('organizers.create') }}" class="btn btn-primary mb-3">Create New Organizer</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($organizers as $organizer)
                    <tr>
                        <td>{{ $organizer->id }}</td>
                        <td>{{ $organizer->name }}</td>
                        <td>{{ $organizer->email }}</td>
                        <td>{{ $organizer->phone }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('organizers.edit', ['organizer' => $organizer]) }}" 
                                   class="btn btn-primary btn-sm">Edit</a>
                                
                                <form action="{{ route('organizers.destroy', ['organizer' => $organizer]) }}" 
                                      method="POST" 
                                      style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No organizers found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>