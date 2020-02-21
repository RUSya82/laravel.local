<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title = 'портал новостей';
        $greeting = [
            'title' => 'Добро пожаловать на наш портал новостей!',
            'content' => 'У нас всегда свежие и актуальные новости. Присоединяйтесь!'
        ];
        $news = News::getAll();


        return view('main', ['title' => $title, 'greeting' => $greeting, 'news' => $news]);
    }
}
