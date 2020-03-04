<?php

namespace App\Http\Controllers;

use App\Feedbacks;
use App\News;
use Illuminate\Http\Request;

/**
 * Class AboutController
 * @package App\Http\Controllers
 * Протопип модели для отзывов
 */
class AboutController extends Controller
{
    /**
     * @param null $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($data = null){

        $categories = News::getCategories();
        return view('about.index', [
            'title' => "О нас",
            'categories' => $categories
        ]);
    }
    //return redirect()->route('news.all')->with('success', 'Новость успешно создана!');

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Добавление отзыва с переадресацией на страницу index,
     * если отзыв добавлен, то выводится благодарность
     */
    public function addFeedback(Request $request){
        if($request->isMethod('post')) {
            $newFeedbacks = [
                'id' => Feedbacks::getCount(),
                'username' => strip_tags($request->username),
                'useremail' => strip_tags($request->useremail),
                'feedbackText' => strip_tags($request->feedbackText),
            ];

            return redirect(route('about.about'))->with('success', 'Отзыв добавлен успешно!');
        }
    }

}
