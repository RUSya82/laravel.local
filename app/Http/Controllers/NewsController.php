<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::query()->paginate(6);
        $categories = Category::all();
        return view('news.all', ['news' => $news, 'title' => "Портал новостей", 'categories' => $categories]);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryOne(Category $category)
    {
        return view('news.byCategories', [
            'news' => $category->news()->paginate(6),
            'title' => $category->description,
            'categories' => Category::all()
        ]);
    }


    public function newsOne(News $news)
    {
        if (empty($news)) {
            return redirect('news');
        }
        $categories = Category::all();
        $newsAll = News::all();
        return view('news.one', ['news' => $news, 'newsAll' => $newsAll,'categories' => $categories]);
    }


}
