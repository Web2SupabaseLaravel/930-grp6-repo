<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HumanController extends Controller
{
    public function index()
    {
        $humans = Human::all();
        return view('admin.humans.index', compact('humans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('humans', 'email')->ignore($request->id),
            ],
            'phone' => 'required|string|max:20',
        ]);

        if ($request->filled('id')) {
            $human = Human::findOrFail($request->id);
            $human->update($request->only(['name', 'email', 'phone']));
            return redirect()->route('humans.index')->with('success', 'Human updated successfully.');
        } else {
            Human::create($request->only(['name', 'email', 'phone']));
            return redirect()->route('humans.index')->with('success', 'Human created successfully.');
        }
    }

    public function destroy($id)
    {
        $human = Human::findOrFail($id);
        $human->delete();

        return redirect()->route('humans.index')->with('success', 'Human deleted successfully.');
    }
}

