<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $fillable = [
        'nik','brl', 'name', 'section_id', 'position', 'role_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function role(){
      return $this->belongsTo('App\Models\Role','role_id');
    }

    public function section(){
      return $this->belongsTo('App\Models\Section','section_id');
    }

    public function report(){
      return $this->hasMany('App\Models\Report');
    }

}
