<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendeeEventsSearch extends Model
{
    use HasFactory;

    protected $table = 'attendee_events_search';

    protected $fillable = [
        'attendee_id',
        'event_id'
    ];

    // Primary key settings
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function attendee()
    {
        return $this->belongsTo(Attendee::class, 'attendee_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
} 