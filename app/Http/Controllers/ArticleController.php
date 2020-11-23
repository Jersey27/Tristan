<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use App\Article;
/**
 * Classe publique des articles de blogs
 * @author Tristan Lefèvre
 * @version 1.0
 */
class ArticleController extends Controller
{

	/**
	 * Liste les articles
	 * @return view Articles, la page listant les articles (un faux article apparait par défaut si il n'y a aucun article dans la base)
	 */
	public function index()
	{
		$articles = DB::table('articles')->get();
		if (count($articles) < 1) {
			$article = new Article();
			$article->id = 0;
			$article->name = "hello";
			$article->text = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio iusto esse praesentium beatae quos voluptas at, rerum sunt eligendi dolorem eaque dolor consequatur recusandae aliquam, numquam optio ab corporis impedit.";
			$articles[0] = $article;
		}
		return view('Articles', ['articles' => $articles]);
	}

	/**
	 * Affiche l'article séléctionné
	 * @return view article, la page de l'article (un faux article apparait par défaut si le faux article est séléctionné depuis la précédente page)
	 */
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
