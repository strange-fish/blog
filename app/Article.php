<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'author_id'];
    //
    public function author() {
        return $this->hasOne('App\User', 'id', 'author_id');
    }
    public function comments() {
        return $this->hasMany("App\Comment");
    }
    public function categories() {
        return $this->belongsToMany('App\Category','article_category');
    }
    public function lovers() {
        return $this->belongsToMany('App\User', 'article_like');
    }
}
