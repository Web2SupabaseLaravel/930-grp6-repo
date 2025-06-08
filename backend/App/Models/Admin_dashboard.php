<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Admin_dashboard extends Model
{
    protected $table='admin_dashboard';
    protected $primaryKey='id';
    protected $fillable = ['admin_id', 'event_id'];

    public function admin(){
        return $this->belongsTo(admin::class,'admin_id');
    }
    public function event(){
        return $this->belongsTo(event::class,'event_id');
    }

}
/*<?php

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
}*/
