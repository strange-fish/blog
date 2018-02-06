<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['content', 'author_id', 'article_id'];

    public function article() {
        $this->belongsTo('App\Article');
    }
    public function author() {
        $this->belongsTo('App\User');
    }
    public function likes() {
        return $this->belongsToMany('App\User','like_comment');
    }
}
