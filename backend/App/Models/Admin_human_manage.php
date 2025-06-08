<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin_human_manage extends Model
{
    protected $table='admin_human_manage';
    protected $primaryKey='id';
    protected $fillable = ['admin_id', 'human_id'];
    public function admin(){
        return $this->belongsTo(admin::class,'admin_id');
    }
    public function human(){
        return $this->belongsTo(human::class,'human_id');
    }
}
/*
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
} */
