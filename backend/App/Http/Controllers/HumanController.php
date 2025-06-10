<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Human;
use Illuminate\Support\Facades\Hash;

class HumanController extends Controller
{
    public function index()
    {
        return response()->json(Human::all());
    }

    // تسجيل مستخدم جديد (Sign Up)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string',
            'age'        => 'required|integer|min:0',
            'password'   => 'required|string|min:6',
            'location'   => 'nullable|string',
            'email'      => 'required|email|unique:human,email',
            'creditcard' => 'nullable|string',
        ]);

        // تشفير كلمة المرور
        $validated['password'] = Hash::make($validated['password']);

        $human = Human::create($validated);

        return response()->json($human, 201);
    }
public function login(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    $human = Human::where('email', $validated['email'])->first();

    if (!$human) {
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ], 404);
    }

    // إضافة طباعة للتحقق
    \Log::info('Input password: ' . $validated['password']);
    \Log::info('Stored hash: ' . $human->password);
    \Log::info('Check result: ' . Hash::check($validated['password'], $human->password));

    if (!Hash::check($validated['password'], $human->password)) {
        return response()->json([
            'success' => false,
            'message' => 'Incorrect password'
        ], 401);
    }

    return response()->json([
        'success' => true,
        'message' => 'Login successful',
        'user' => $human,
    ]);
}

}
