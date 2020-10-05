<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageBlog extends Model
{
    protected $fillable = ['title','path'];
    
    public $timestampts = true;

    public function blog()
    {
    	return $this->belongTo('App\Blog');
    }
}
