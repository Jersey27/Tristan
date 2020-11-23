<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Article;

/**
 * La classe d'administration des articles de blogs
 * @author Tristan Lefèvre
 * @version 1.0
 */
class AdminArticleController extends Controller
{
    /**
     * Montre la page d'administration des articles de blogs
     * @return view page AdminArticle listant les articles de blog
     */
    public function index() {
        $articles = DB::table('articles')->get();
        if(count($articles) > 0) {
            return view('adminArticle', ['articles' => $articles]);
        } else {
            return view('adminArticle');
        }
    }
    /**
     * Montre le formulaire pour créer un article
     * @return view page AdminArticleForm, le formulaire de création d'article
     */
    public function newArticle() {
        return view('adminArticleForm');
    }
    
    /**
     * Affiche le formulaire pour modifier un article
     * @return view page AdminArticleForm, le formulaire pour modifier un article
     */
    public function modifyArticle($id) {
        $article = Article::find($id);
        return view('adminArticleForm',['article'=>$article]);
    }
    
    /**
     * Poste le nouvel article
     * @return view redirection vers la page d'administration
     */
    public function postNewArticle(Request $request) {
        var_dump($request->nameNewArticle);
        $article = new Article();
        $article->create(['name' => $request->nameNewArticle, 'text' => $request->textNewArticle]);
        $article->save;
        return redirect()->route('adminBlog');
    }

    /**
     * Poste les mises à jour de l'article
     * @return view redirection vers la page d'administration
     */
    public function postArticle(Request $request) {
        $article = Article::find($request->id);
        $article->update(['name' => $request->nameArticle, 'text' => $request->textArticle]);
        return redirect()->route('adminBlog');
    }
    
    /**
     * Supprime l'article
     * @return view retour vers la page d'administration
     */
    public function removeArticle($id) {
        $article = Article::find($id)->delete();
        return back();
    }
}
