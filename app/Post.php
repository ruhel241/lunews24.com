<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Category;
use App\Department;
use App\Organization;


class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title','description','post_thumbnail','status','user_id','category_id','department_id','organization_id','hits'
    ]; 



    public function users()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }


    public function categories()
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }


    public function departments()
    {
        return $this->belongsTo('App\Department','department_id');
    }


    public function organizations()
    {
        return $this->belongsTo('App\Organization','organization_id');   
    }


}
 