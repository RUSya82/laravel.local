<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $title = 'Портал новостей';
        $greeting = [
            'title' => 'Добро пожаловать на наш портал новостей!',
            'content' => 'У нас всегда свежие и актуальные новости. Присоединяйтесь!'
        ];
        $news = News::getAll();
        $categories = News::getCategories();


        return view('main', ['title' => $title, 'greeting' => $greeting, 'news' => $news, 'categories'=>$categories]);
    }
}
