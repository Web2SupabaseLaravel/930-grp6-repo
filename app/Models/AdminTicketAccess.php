<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminTicketAccess extends Model
{
    use HasFactory;

    protected $table = 'admin_ticket_access';

    protected $fillable = ['admin_id', 'ticket_type_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function ticketType()
    {
        return $this->belongsTo(TicketType::class);
    }
}
