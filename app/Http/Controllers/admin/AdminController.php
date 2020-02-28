<?php

namespace App\Http\Controllers\admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function index(){
        $title = "Admin panel";
        $categories = News::getCategories();
        return view('admin.index', ['title' => $title,'categories' => $categories]);
    }

    public function addNews(Request $request){
        if($request->isMethod('post')){
            //dump($request->all());
            $newNews = [
                'id' => News::getCount(),
                'title' => strip_tags($request->newsTitle),
                'category_id' => (int)$request->category,
                'content' => strip_tags($request->newContent),
            ];
            News::saveNews($newNews);
            return redirect('news');
        }
        //dd(News::getAll());
        $categories = News::getCategories();
        return view('admin.addNews', ['title' => 'Добавление новости', 'categories' => $categories]);
    }

    public function test2(){

        return redirect('news');
    }
}
