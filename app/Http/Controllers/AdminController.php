<?php

namespace App\Http\Controllers;

use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        return Admin::with('dashboard')->get();
    }

    public function show($id)
    {
        return Admin::with('dashboard')->findOrFail($id);
    }
}
