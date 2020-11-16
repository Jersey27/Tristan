<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use App\Article;
class ArticleController extends Controller
{

	public function __contruct(PostRepository $postRepository)
	{
		
	}

	public function index()
	{
		$articles = DB::table('Articles')->get();
		if (count($articles) < 1) {
			$article = new Article();
			$article->id = 0;
			$article->name = "hello";
			$article->text = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio iusto esse praesentium beatae quos voluptas at, rerum sunt eligendi dolorem eaque dolor consequatur recusandae aliquam, numquam optio ab corporis impedit.";
			$articles[0] = $article;
		}
		return view('Articles', ['articles' => $articles]);
	}

    public function getArticle($n) 
    {
		if ($n == 0) {
			$article = new Article();
			$article->name = "hello";
			$article->text = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio iusto esse praesentium beatae quos voluptas at, rerum sunt eligendi dolorem eaque dolor consequatur recusandae aliquam, numquam optio ab corporis impedit.";
		} else {
			$article = Article::find($n);
			$tempTime = Carbon::parse($article->created_at);
			$postTime = strval($tempTime->day) . " " . $tempTime->locale('fr')->monthName . " " . strval($tempTime->year);
		}
    	return view('Article',['article' => $article, 'postTime' => $postTime]);
    }
}
