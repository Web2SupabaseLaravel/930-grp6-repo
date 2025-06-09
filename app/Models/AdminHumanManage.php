<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminHumanManage extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'human_id'];

    protected $table = 'admin_human_manage';

    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public function human() {
        return $this->belongsTo(Human::class);
    }
}
