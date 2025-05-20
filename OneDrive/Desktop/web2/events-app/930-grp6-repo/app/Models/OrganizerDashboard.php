<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizerDashboard extends Model
{
    protected $fillable = [
        'organizer_id',
        'event_id'
    ];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}