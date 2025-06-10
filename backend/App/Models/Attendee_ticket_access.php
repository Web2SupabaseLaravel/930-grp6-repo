<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendee_ticket_access extends Model
{
    protected $table='attendee_ticket_access';
    protected $primaryKey='id';
    protected $fillable = ['attendee_id', 'ticket_id'];

    public function attendee(){
        return $this->belongsTo(attendee::class,'attendee_id');
    }
    public function ticket(){
        return $this->belongsTo(ticket::class,'ticket_id');
    }
}
/*
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendee_ticket_access extends Model
{
    protected $table='attendee_ticket_access';
    protected $primaryKey='id';

    public function attendee(){
        return $this->belongsTo(attendee::class,'attendee_id');
    }
    public function ticket(){
        return $this->belongsTo(ticket::class,'ticket_id');
    }
} */
