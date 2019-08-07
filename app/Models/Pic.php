<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
  public $timestamps = false;
  protected $fillable = [
      'id','name',
  ];

  public function report(){
    return $this->hasMany('App\Models\Report');
  }
}
