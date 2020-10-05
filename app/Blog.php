<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $fillable = ['name','text'];

	public $timestamps;

	public function ImageBlog()
	{
		return $this->hasMany('App\ImageBlog');
	}
}
