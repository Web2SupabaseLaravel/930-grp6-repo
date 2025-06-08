<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class organizer_dashboard extends Model
{
    protected $table='organizer_dashboard';
    protected $primaryKey='id';
    protected $fillable = ['organizer_id', 'event_id'];

    public function organizer(){
        return $this->belongsTo(organizer::class,'organizer_id');
    }
    public function event(){
        return $this->belongsTo(event::class,'event_id');
    }

}
/*
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizerDashboard extends Model
{
    protected $fillable = [
        'organizer_id',
        'event_id'
    ];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
} */
