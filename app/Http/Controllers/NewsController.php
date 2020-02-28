<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::getAll();
        $title = "Портал новостей";
        //dd($news);
        $categories = News::getCategories();
        return view('news.all', ['news' => $news, 'title' => $title, 'categories' => $categories]);
    }


    public function categoryOne($category_name)
    {
        $news = News::getNewsByCategory($category_name);
        $title = DB::table('categories')->where('name', $category_name)->first()->description;
        $categories = News::getCategories();
        return view('news.byCategories', ['news' => $news, 'title' => $title,'categories' => $categories]);

    }


    public function newsOne(int $id)
    {
        $news = News::getOne($id);
        if (empty($news)) {
            return redirect('news');
        }
        $categories = News::getCategories();
        $newsAll = News::getSomeAll(12);
        return view('news.one', ['news' => $news, 'newsAll' => $newsAll,'categories' => $categories]);
    }


}
