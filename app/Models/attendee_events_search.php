<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendee_events_search extends Model
{
    protected $table='attendee_events_search';
    protected $primaryKey='id';

    public function attendee(){
        return $this->belongsTo(attendee::class,'attendee_id');
    }
    public function event(){
        return $this->belongsTo(event::class,'event_id');
    }
}
