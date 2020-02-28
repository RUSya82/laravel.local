<?php

namespace App;
/***
 * Прототип модели для новостей
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{

    /**
     * вернёт одну новость по id
     * @param $id
     * @return bool|mixed
     */
    public static function getOne($id)
    {
        return DB::table('news')->find((int)$id);
    }

    /**
     * @return array все новости
     */
    public static function getAll()
    {
        $data = DB::table('news')->get();

        return $data;
    }

    public static function getSomeAll($count)
    {
        $data = DB::table('news')->get()->take($count);

        return $data;
    }

    /**
     * @return array getter для массива категорий
     */
    public static function getCategories()
    {
        $categories = DB::table('categories')->get();
        return $categories;
    }




    public static function saveNews($news)
    {
        $allNews = static::getAll();
        $allNews[] = $news;
        $newAllNews = serialize($allNews);
        file_put_contents('data.php', $newAllNews);
    }


    /**
     * @param string $categoryName
     * @return array
     * возвращает массив новостей по имени категории
     */
    public static function getNewsByCategory(string $categoryName)
    {
        $category_id = DB::table('categories')->select('id')->where('name', $categoryName)->first()->id;
        $news = DB::table('news')->where('category_id', $category_id)->get();
        return $news;
    }
}
