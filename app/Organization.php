<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Post;

class Organization extends Model
{
   protected $table = 'organizations';
   protected $fillable = ['title','slug'];


	public function posts()
    {
        return $this->hasMany('App\Post','organization_id');
    }

}


