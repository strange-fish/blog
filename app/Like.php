<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
  protected $fillable = [
    'user_id',
    'status',
    'likeable_id',
    'likeable_type',
  ];
  public function likeable () {
    return $this->morphTo();
  }

}
