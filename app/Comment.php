<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['content', 'author_id',];

    public function author () {
      return $this->belongsTo('App\User');
    }
    public function commentable () {
      return $this->morphTo();
    }
}
