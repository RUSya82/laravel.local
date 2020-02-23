<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::getAll();
        $title = "Портал новостей";
        return view('news.all', ['news' => $news, 'title' => $title]);
    }


    public function categoryOne($category_name)
    {
        $news = News::getNewsByCategory($category_name);
        $title = News::getOneCategory(News::getIdByName($category_name))['description'];
        return view('news.byCategories', ['news' => $news, 'title' => $title]);

    }


    public function newsOne(int $id)
    {
        $news = News::getOne($id);
        if (empty($news)) {
            return redirect('news');
        }
        $newsAll = News::getAll();


        return view('news.one', ['news' => $news, 'newsAll' => $newsAll]);
    }


}
