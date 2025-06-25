<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Human;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class HumanController extends Controller
{
    public function index()
{
    return response()->json(Human::all());
}

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
    $validated['password'] = Hash::make($validated['password']);
    $human = Human::create($validated);
    return response()->json($human, 201);
}

public function update(Request $request, $id)
{
    $human = Human::findOrFail($id);

    $validated = $request->validate([
        'name'       => 'required|string',
        'age'        => 'required|integer|min:0',
        'location'   => 'nullable|string',
        'email'      => 'required|email|unique:human,email,' . $id . ',human_id',
        'creditcard' => 'nullable|string',
    ]);


    $human->fill($validated);
    $human->save();

    return response()->json($human);
}

public function destroy($id)
{
    $human = Human::findOrFail($id);
    $human->delete();

    return response()->json(['message' => 'Human deleted successfully']);
}
public function show($id)
{
    $human = Human::findOrFail($id);
    return response()->json($human);
}
public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ], 422);
    }

    $user = Human::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid email or password',
        ], 401);
    }

    return response()->json([
        'status' => true,
        'user' => $user,
    ]);
}
}
