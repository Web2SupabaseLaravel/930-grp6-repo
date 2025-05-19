<?php

namespace App\Http\Controllers;

use App\Models\AdminDashboard;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return AdminDashboard::with('admin')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'admin_id' => 'required|exists:users,id',
            'revenue' => 'required|numeric',
            'registration_demographics' => 'nullable|array',
        ]);

        return AdminDashboard::create($data);
    }
}
