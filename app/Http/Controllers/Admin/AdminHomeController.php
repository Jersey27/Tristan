<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\information;


class AdminHomeController extends Controller
{
    /**
     * Fonction de la page d'acceuil du CMS
     * @return view vue de la page d'acceuil
     */
    public function home() {
        $home = array();
        $message= 0;
        $home[0] = DB::table('informations')->where('information_key', 'aboutme')->first();
        return view('adminHome',['message' => $message, 'home' => $home]);
    }
    public function modifyHome(Request $request) {
        $information = DB::table('informations',$request->id);
        $information->update(['information_key' => $request->information_key, "information_data" => $request->information_data]);

        return back();
    }
}
