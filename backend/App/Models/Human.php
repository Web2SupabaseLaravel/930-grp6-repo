<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    protected $table = 'human';
    protected $primaryKey = 'human_id';
    public $incrementing = true;
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = [
        'human_id',
        'name',
        'age',
        'password',
        'location',
        'email',
        'creditcard',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
