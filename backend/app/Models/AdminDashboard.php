<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminDashboard extends Model
{
    protected $table = 'admin_dashboards';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
  'dashboard',
  'event_registrations',
  'revenue',
  'attendee_demographics',
  'admin_id'
];


    public function admin()
{
    return $this->belongsTo(Admin::class);
}

}
