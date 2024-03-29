<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'bio',
        'avater',
        'slug',
        'is_admin'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function profile(){
//        return $this->hasOne('App\Profile');
//    }



    public function stories(){
        return $this->hasMany('App\Story');
    }


    public function storyimages(){
        return$this->hasMany('App\StoryImage');
    }

}
