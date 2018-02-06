<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'author_id'];
    //
    public function author() {
        $this->hasOne('App\User');
    }
    public function comments() {
        $this->hasMany("app\Comment");
    }
    public function categories() {
        return $this->belongsToMany('App\Category','article_category');
    }
}
