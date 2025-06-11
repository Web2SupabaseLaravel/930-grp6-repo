<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
{
    return Admin::all();
}
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $data['password'] = bcrypt($data['password']);
        return Admin::create($data);
    }

    public function update(Request $request, $id)
{
    $admin = Admin::findOrFail($id);
    $admin->update($request->only('name', 'email'));

    return response()->json([
        'admin_id' => $admin->admin_id,
        'name'     => $admin->name,
        'email'    => $admin->email,
    ]);
}


    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
