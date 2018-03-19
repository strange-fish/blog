<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles() {
        return $this->hasMany('App\Article', 'author_id');
    }
    public function comments() {
        return $this->hasMany("App\Comment");
    }
    public function profile() {
        return $this->hasOne('App\Profile');
    }
    public function likeArticles() {
      return $this->belongsToMany('App\Article', 'article_like');
    }
}
