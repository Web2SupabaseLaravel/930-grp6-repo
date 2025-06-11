<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Human;
use App\Models\Admin;
use App\Models\AdminHumanManage;

class HumanController extends Controller
{
    public function indexAccess()
    {
        $data = DB::table('admin_human_manage')
            ->join('admin', 'admin.admin_id', '=', 'admin_human_manage.admin_id')
            ->join('human', 'human.human_id', '=', 'admin_human_manage.human_id')
            ->select(
                'admin_human_manage.id',
                'admin_human_manage.admin_id',
                'admin.name as admin_name',
                'admin_human_manage.human_id',
                'human.name as human_name'
            )
            ->get();

        return response()->json($data);
    }

    public function getAdmins()
    {
        return response()->json(Admin::select('admin_id as id', 'name')->get());
    }

    public function getHumans()
    {
        return response()->json(Human::select('human_id as id', 'name')->get());
    }

    public function index()
    {
        return response()->json(Human::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        if ($request->filled('id')) {
            $human = Human::findOrFail($request->id);
            $human->update($request->only(['name', 'email', 'phone']));
            return response()->json(['message' => 'Updated successfully', 'data' => $human]);
        } else {
            $human = Human::create($request->only(['name', 'email', 'phone']));
            return response()->json(['message' => 'Created successfully', 'data' => $human]);
        }
    }

    public function destroy($id)
    {
        $human = Human::findOrFail($id);
        $human->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}
