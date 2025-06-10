<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    protected $table = 'attendee';

    protected $fillable = [
        'human_id'
    ];

    // Primary key settings
    protected $primaryKey = 'attendee_id';
    public $incrementing = true;

    public function human()
    {
        return $this->belongsTo(Human::class, 'human_id');
    }

    public function eventSearches()
    {
        return $this->hasMany(AttendeeEventsSearch::class, 'attendee_id');
    }

    public function ticketAccesses()
    {
        return $this->hasMany(AttendeeTicketAccess::class, 'attendee_id');
    }
} 