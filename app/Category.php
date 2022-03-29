<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['title','slug']; 



      public function posts()
    {
        return $this->hasMany('App\Post', 'category_id')->orderBy('id', 'desc');
    }

    
}
