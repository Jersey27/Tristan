<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Article;

class AdminArticleController extends Controller
{
    public function index() {
        $articles = DB::table('articles')->get();
        if(count($articles) > 0) {
            return view('adminArticle', ['articles' => $articles]);
        } else {
            return view('adminArticle');
        }
    }
    
    public function newArticle() {
        return view('adminArticleForm');
    }
    
    public function modifyArticle($id) {
        $article = Article::find($id);
        return view('adminArticleForm',['article'=>$article]);
    }

    public function postNewArticle(Request $request) {
        var_dump($request->nameNewArticle);
        $article = new Article();
        $article->create(['name' => $request->nameNewArticle, 'text' => $request->textNewArticle]);
        $article->save;
        return redirect()->route('adminBlog');
    }

    public function postArticle($id, Request $request) {
        $article = Article::find($id);
        $article->update(['name' => $request->nameArticle, 'text' => $request->textArticle]);
        return redirect()->route('adminBlog');
    }
    
    public function removeArticle($id) {
        $article = Article::find($id)->delete();
        return back();
    }
}
