<?php

namespace App\Http\Controllers;

use App\Models\Admin_dashboard;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $dashboards = Admin_dashboard::with(['admin', 'event'])->get();
        return response()->json($dashboards);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'admin_id' => 'required|exists:admins,id',
            'event_id' => 'required|exists:events,id',
        ]);

        $dashboard = Admin_dashboard::create($validated);
        return response()->json($dashboard, 201);
    }

    public function show($id)
    {
        $dashboard = Admin_dashboard::with(['admin', 'event'])->findOrFail($id);
        return response()->json($dashboard);
    }

    public function update(Request $request, $id)
    {
        $dashboard = Admin_dashboard::findOrFail($id);

        $validated = $request->validate([
            'admin_id' => 'sometimes|exists:admins,id',
            'event_id' => 'sometimes|exists:events,id',
        ]);

        $dashboard->update($validated);
        return response()->json($dashboard);
    }

    public function destroy($id)
    {
        $dashboard = Admin_dashboard::findOrFail($id);
        $dashboard->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}


/*
<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDashboard extends Model
{
    public function admin()
{
    return $this->belongsTo(Admin::class, 'admin_id');
}

    use HasFactory;
    protected $fillable = ['dashboard', 'event_registrations', 'revenue', 'attendee_demographics', 'admin_id'];
}

*/
