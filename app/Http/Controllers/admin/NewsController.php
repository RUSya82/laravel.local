<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $news = News::query()->paginate(6);
        return view('admin.index', [
            'title' => "Admin panel",
            'categories' => $categories,
            'news' => $news
        ]);
    }


    public function create(Request $request)
    {
        $news = new News();
        if ($request->isMethod('post')) {


            //$this->validate($request, News::rules());
            $this->validate($request, News::rules(), [], News::attributeNames());
            $news->fill($request->all());
            $news->save();
            return redirect()->route('admin.index')->with('success', 'Новость успешно добавлена!');
        }
        if(!empty($request->old())){
            $news->fill($request->old());
        }

        $categories = Category::all();
        return view('admin.addNews', [
            'title' => 'Добавление новости',
            'categories' => $categories,
            'news'=>$news] );
    }


    public function save(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, News::rules(), [], News::attributeNames());
            $news->fill($request->all());
            $news->save();
            return redirect()->route('admin.index')->with('success', 'Новость успешно изменена!');
        }

    }


    public function show($id)
    {
        //
    }


    public function edit(Request $request, News $news)
    {
        return view('admin.editNews', [
            'title' => 'Редактирование новости',
            'news' => $news,
            'categories' => Category::all()]
        );
    }

    public function update(Request $request, News $news)
    {
        dd($news);
    }


    public function delete(News $news)
    {
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость успешно удалена!');
    }
}
