<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket'; 

    protected $fillable = [
        'type',
        'price',
        'quantity',
        'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
