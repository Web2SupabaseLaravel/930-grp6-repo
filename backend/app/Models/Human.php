<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Human extends Model
{
    use HasFactory;
    
    protected $table = 'human';
    protected $fillable = ['id'];

    public function attendees()
    {
        return $this->hasMany(Attendee::class, 'human_id');
    }
} 