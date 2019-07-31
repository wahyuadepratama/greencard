<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $fillable = [
      'id','name', 'created_at', 'updated_at',
  ];

  public function user(){
    return $this->hasMany('App\Models\User');
  }

}
