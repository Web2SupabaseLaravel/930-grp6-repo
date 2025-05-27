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

