<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\AdminUser as Authenticatable;

class AdminUser extends Model
{
    use Notifiable;
    /**
     * 与模型关联的数据表
     * 
    */
     protected $fillable = [
        'name', 'password',
    ];
   
}
