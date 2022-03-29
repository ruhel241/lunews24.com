<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Post;

class Department extends Model
{
    protected $table = "departments";
	protected $fillable = ['title','slug'];

	
 	public function posts()
    {
        return $this->hasMany('App\Post','department_id');
    }

}



    