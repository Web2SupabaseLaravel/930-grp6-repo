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
}
