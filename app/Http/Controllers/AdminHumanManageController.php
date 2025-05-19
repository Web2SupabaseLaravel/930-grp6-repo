<?php
namespace App\Http\Controllers;

use App\Models\AdminHumanManage;
use Illuminate\Http\Request;

class AdminHumanManageController extends Controller
{
    public function index()
    {
        return response()->json(AdminHumanManage::with(['admin', 'user'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'admin_id' => 'required|exists:admins,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $record = AdminHumanManage::create($request->only(['admin_id', 'user_id']));
        return response()->json($record, 201);
    }

    public function show($id)
    {
        $record = AdminHumanManage::with(['admin', 'user'])->findOrFail($id);
        return response()->json($record);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'admin_id' => 'sometimes|exists:admins,id',
            'user_id' => 'sometimes|exists:users,id',
        ]);

        $record = AdminHumanManage::findOrFail($id);
        $record->update($request->only(['admin_id', 'user_id']));
        return response()->json($record);
    }

    public function destroy($id)
    {
        $record = AdminHumanManage::findOrFail($id);
        $record->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
