<form action="{{ route('admin.update', $admin->admin_id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $admin->name }}" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $admin->email }}" required>
    </div>

    <button type="submit">Update Admin</button>
</form>
