<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $fillable = [
        'name',
        'description',
        'date',
        'location',
    ];

    public function ticketTypes()
    {
        return $this->hasMany(TicketType::class);
    }
}
