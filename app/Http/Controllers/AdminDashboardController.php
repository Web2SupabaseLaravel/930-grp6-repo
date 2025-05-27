<?php
namespace App\Http\Controllers;
use App\Models\AdminDashboard;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() { return view('admin_dashboards.index', ['dashboards' => AdminDashboard::with('admin')->get()]); }
    public function create() { return view('admin_dashboards.create', ['admins' => Admin::all()]); }
    public function store(Request $request) {
        AdminDashboard::create($request->validate([
            'dashboard'=>'required','event_registrations'=>'required',
            'revenue'=>'required','attendee_demographics'=>'required','admin_id'=>'required|exists:admins,id'
        ])); return redirect()->route('admin_dashboards.index')->with('success','Dashboard created');
    }
    public function edit(AdminDashboard $admin_dashboard) { return view('admin_dashboards.edit',compact('admin_dashboard')); }
    public function update(Request $request, AdminDashboard $admin_dashboard) {
        $admin_dashboard->update($request->validate([
            'dashboard'=>'required','event_registrations'=>'required',
            'revenue'=>'required','attendee_demographics'=>'required'
        ])); return redirect()->route('admin_dashboards.index')->with('success','Dashboard updated');
    }
    public function destroy(AdminDashboard $admin_dashboard) {
        $admin_dashboard->delete(); return redirect()->route('admin_dashboards.index')->with('success','Dashboard deleted');
    }
}
