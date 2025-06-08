<?php

namespace App\Http\Controllers;

use App\Models\admin_human_manage;
use Illuminate\Http\Request;

class AdminHumanManageController extends Controller
{
    public function index()
    {
        $records = admin_human_manage::with(['admin', 'human'])->get();
        return response()->json($records);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'admin_id' => 'required|exists:admins,id',
            'human_id' => 'required|exists:humans,id',
        ]);

        $record = admin_human_manage::create($validated);
        return response()->json($record, 201);
    }

    public function show($id)
    {
        $record = admin_human_manage::with(['admin', 'human'])->findOrFail($id);
        return response()->json($record);
    }

    public function update(Request $request, $id)
    {
        $record = admin_human_manage::findOrFail($id);

        $validated = $request->validate([
            'admin_id' => 'sometimes|exists:admins,id',
            'human_id' => 'sometimes|exists:humans,id',
        ]);

        $record->update($validated);
        return response()->json($record);
    }

    public function destroy($id)
    {
        $record = admin_human_manage::findOrFail($id);
        $record->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
/*
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminHumanManage;
use App\Models\AdminTicketAccess;

class AdminAccessController extends Controller
{
    public function humansIndex()
    {
        return AdminHumanManage::with(['admin', 'human'])->get();
    }

    public function ticketsIndex()
    {
        return AdminTicketAccess::with(['admin', 'ticket'])->get();
    }

    public function addHumanAccess(Request $request)
    {
        $data = $request->validate([
            'admin_id' => 'required|exists:admins,id',
            'human_id' => 'required|exists:humans,id'
        ]);

        return AdminHumanManage::create($data);
    }

    public function addTicketAccess(Request $request)
    {
        $data = $request->validate([
            'admin_id' => 'required|exists:admins,id',
            'ticket_id' => 'required|exists:tickets,id'
        ]);

        return AdminTicketAccess::create($data);
    }
} */
