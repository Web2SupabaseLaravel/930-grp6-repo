<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendee extends Model
{
    protected $table = 'attendee';
    public function human()
    {
        return $this->belongsTo(human::class, 'human_id');
    }


}
