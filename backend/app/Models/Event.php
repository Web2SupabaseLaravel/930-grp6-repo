<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    
    protected $table = 'events';
    
    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'location',
        'capacity',
        'category',
        'status',
        'organizer_id'
    ];

    public function attendeeSearches()
    {
        return $this->hasMany(AttendeeEventsSearch::class, 'event_id');
    }

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }
} 