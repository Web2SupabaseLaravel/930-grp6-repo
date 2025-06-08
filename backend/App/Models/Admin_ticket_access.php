<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin_ticket_access extends Model
{
    protected $table='admin_ticket_access';
    protected $primaryKey='id';
    protected $fillable = ['admin_id', 'event_id', 'ticket_id'];

    public function admin(){
        return $this->belongsTo(admin::class,'admin_id');
    }
    public function event(){
        return $this->belongsTo(event::class,'event_id');
    }
    public function ticket(){
        return $this->belongsTo(ticket::class,'ticket_id');
    }
}
/*<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminTicketAccess extends Model
{
    use HasFactory;

    protected $table = 'admin_ticket_access';

    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }
} */
