<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisement';

    protected $fillable = ['title', 'post_thumbnail','image_url','show_hide','type','ending_date'];

}
