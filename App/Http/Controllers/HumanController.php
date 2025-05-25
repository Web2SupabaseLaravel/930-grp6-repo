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

public function store(Request $request)
{
    $validated = $request->validate([
        'human_id'   => 'required|integer|unique:human,human_id',
        'name'       => 'required|string',
        'age'        => 'required|integer|min:0',
        'password'   => 'required|string|min:6',
        'location'   => 'nullable|string',
        'email'      => 'required|email|unique:human,email',
        'creditcard' => 'nullable|string',
    ]);

    $human = Human::create($validated);
    return response()->json($human, 201);
}

public function show($id)
{
    $human = Human::findOrFail($id);
    return response()->json($human);
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

}


