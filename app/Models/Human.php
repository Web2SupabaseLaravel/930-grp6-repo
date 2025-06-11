<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    use HasFactory;

    protected $table = 'admin_human_manage';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'email', 'phone'];
}
