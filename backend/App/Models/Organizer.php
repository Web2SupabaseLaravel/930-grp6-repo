<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class organizer extends Model
{
    protected $table = 'organizer';
    protected $primaryKey = 'organizer_id';
    public function human()
    {
        return $this->belongsTo(Human::class,'organizer_id','human_id');
    }


}
/*
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function dashboard()
    {
        return $this->hasOne(OrganizerDashboard::class);
    }
} */
