<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
	public function __contruct(PostRepository $postRepository)
	{
		$this->middleware('auth',['expect' => 'index']);
		$this->middleware('admin', ['exept']);
	}

	public function index()
	{
		return view('Articles');
	}

    public function getArticle($n) 
    {

    	return view('Article');
    }
}
