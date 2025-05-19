<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminTicketAccess extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'ticket_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
