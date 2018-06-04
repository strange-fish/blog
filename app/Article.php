<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'author_id'];
    //
    public function author () {
      return $this->hasOne('App\User', 'id', 'author_id');
    }

    public function comments () {
      return $this->morphMany('App\Comment', 'commentable');
    }

    public function likes () {
      return $this->morphMany('App\Like', 'liveable');
    }

    public function tags () {
      return $this->morphToMany('App\Tag', 'taggable');
    }
}
