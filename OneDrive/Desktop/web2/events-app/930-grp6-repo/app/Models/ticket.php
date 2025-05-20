<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';
    protected $primaryKey = 'ticket_id';
    public $incrementing = true;
    protected $fillable = [
        'title',
        'description',
        'price',
        'quantity',
        'date',
        'free',
        'sales',
        'seat',
        'status'
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'ticket_id', 'ticket_id');
    }
}