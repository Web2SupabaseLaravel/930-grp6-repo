<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        
        $admins = Admin::with('human')->paginate(10);
        return response()->json($admins);
    }

    public function show($id)
    {
        $admin = Admin::with('human')->find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }
        return response()->json($admin);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'human_id' => 'required|exists:human,human_id',

        ]);

        $admin = Admin::create($validated);

        return response()->json($admin, 201);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }

        $validated = $request->validate([
            'human_id' => 'sometimes|required|exists:human,human_id',
            // أضف حقول إضافية خاصة بالـ Admin إن وجدت
        ]);

        $admin->update($validated);

        return response()->json($admin);
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }

        $admin->delete();

        return response()->json(null, 204);
    }
}
/*
<?php
namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() { return view('admins.index', ['admins' => Admin::all()]); }
    public function store(Request $request) {
        Admin::create($request->validate(['name'=>'required','email'=>'required','password'=>'required']));
        return redirect()->back()->with('success','Admin created');
    }
    public function update(Request $request, Admin $admin) {
        $admin->update($request->validate(['name'=>'required','email'=>'required']));
        return redirect()->back()->with('success','Admin updated');
    }
    public function destroy(Admin $admin) {
        $admin->delete(); return redirect()->back()->with('success','Admin deleted');
    }
}

*/
