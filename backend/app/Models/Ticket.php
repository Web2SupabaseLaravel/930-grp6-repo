<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    
    protected $table = 'tickets';
    
    protected $fillable = [
        'event_id',
        'type',
        'price',
        'quantity',
        'status'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function attendeeAccesses()
    {
        return $this->hasMany(AttendeeTicketAccess::class, 'ticket_id');
    }
} 