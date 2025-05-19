<?php

namespace App\Models;

class Admin extends User
{
    protected static function booted()
    {
        static::addGlobalScope('admin', function ($query) {
            $query->where('role', 'admin');
        });
    }

    public function dashboard()
    {
        return $this->hasOne(AdminDashboard::class, 'admin_id');
    }
}
