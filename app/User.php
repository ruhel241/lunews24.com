<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users'; 

    protected $fillable = [
        'first_name','last_name','mobile','dept','batch','gender','role','verifyToken','email','password','verifyToken'
    ];
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id');
    }

}

