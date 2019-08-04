<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
  public $timestamps = false;
  protected $fillable = [
      'id','name',
  ];

  public function user(){
    return $this->hasMany('App\Models\User');
  }
}
