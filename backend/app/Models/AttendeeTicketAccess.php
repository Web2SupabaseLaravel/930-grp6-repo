<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendeeTicketAccess extends Model
{
    use HasFactory;

    protected $table = 'attendee_ticket_access';

    protected $fillable = [
        'attendee_id',
        'ticket_id'
    ];

    // Primary key settings
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function attendee()
    {
        return $this->belongsTo(Attendee::class, 'attendee_id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
} 