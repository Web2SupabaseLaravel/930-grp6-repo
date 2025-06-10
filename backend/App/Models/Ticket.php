<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class ticket extends model
{
    protected $table='ticket';
protected $fillable = [
        'sales',
        'quantity',
        'seat',
        'description',
        'paid',
        'free',
        'organizer_id',
        'created_at',
        'qr_code',
    ];    protected $primaryKey ='ticket_id';
    public function organizer()
    {
        return $this->belongsTo(organizer::class,"organizer_id");
    }
}

/*
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
} */
