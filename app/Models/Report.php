<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
  protected $fillable = [
      'id', 'nik', 'date', 'time', 'location', 'detail_location', 'danger_category', 'danger_code', 'description', 'risk',
      'action', 'pic', 'status', 'created_at', 'updated_at',
  ];

  public function getCreatedAtAttribute()
  {
      return \Carbon\Carbon::parse($this->attributes['date'])
         ->format('d, M Y H:i');
  }

  public function getUpdatedAtAttribute()
  {
    return \Carbon\Carbon::parse($this->attributes['updated_at'])->diffForHumans();
  }

  public function user(){
    return $this->belongsTo('App\Models\User','nik');
  }

  public function pic(){
    return $this->belongsTo('App\Models\PIC','pic');
  }

}
