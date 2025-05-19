<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'age',
        'credit_card',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'credit_card',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ===== Relationships =====

    public function dashboard()
    {
        return $this->hasOne(AdminDashboard::class, 'admin_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'organizer_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'buyer_id');
    }

    // ===== Scopes =====

    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    public function scopeOrganizers($query)
    {
        return $query->where('role', 'organizer');
    }

    public function scopeAttendees($query)
    {
        return $query->where('role', 'attendee');
    }
}
