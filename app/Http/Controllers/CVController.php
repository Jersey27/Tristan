<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CVController extends Controller
{
    public function index() {

        $experiences = [['id' => 'test1', 'name' => 'test1', 'description' => 'Lorem Ipsum'], ['id' => 'test2', 'name' => 'test 2', 'description' => 'Lorem Ipsum']];
        $competences = [['id' => 'test1', 'name' => 'test 1', 'level' => 10, 'description' => 'Lorem Ipsum'],['id' => 'test2', 'name' => 'test 2', 'level' => 95, 'description' => 'Lorem Ipsum']];
        return view('CV', ['experiences' => $experiences, 'competences' => $competences]);
    }
}
