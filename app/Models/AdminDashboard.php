<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDashboard extends Model
{
    public function admin()
{
    return $this->belongsTo(Admin::class, 'admin_id');
}

    use HasFactory;
    protected $fillable = ['dashboard', 'event_registrations', 'revenue', 'attendee_demographics', 'admin_id'];
}