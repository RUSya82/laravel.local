<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __invoke(){
       $title = "О нас";
        return view('about', ['title' => $title]);
    }
}
