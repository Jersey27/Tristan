<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\information;


/**
 * Classe d'administration principal et de la page d'acceuil
 * @author Tristan Lefèvre
 * @version 1.0 
 */
class AdminHomeController extends Controller
{
    /**
     * affiche la page d'acceuil du CMS
     * @return view vue de la page d'acceuil
     */
    public function home() {
        $home = array();
        $message= 0;
        $home[0] = DB::table('informations')->where('information_key', 'aboutme')->first();
        return view('adminHome',['message' => $message, 'home' => $home]);
    }
    /**
     * Modifie un élément de la page d'acceuil
     * @return view redirige sur la même page
     */
    public function modifyHome(Request $request) {
        $information = DB::table('informations',$request->id);
        $information->update(['information_key' => $request->information_key, "information_data" => $request->information_data]);

        return back();
    }
}
