<?php

namespace App;
/***
 * Прототип модели для новостей
 */

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public static $categories = [
        [
            'id' => 1,
            'name' => 'sport',
            'description' => "Новости спорта"
        ],
        [
            'id' => 2,
            'name' => 'govenment',
            'description' => "Новости политики"
        ],
        [
            'id' => 3,
            'name' => 'nature',
            'description' => "Новости природы"
        ]
    ];
    /**
     * @var array массив новостей
     */
    public static $news;

    /**
     * вернёт одну новость по id
     * @param $id
     * @return bool|mixed
     */
    public static function getOne($id)
    {
        $news = static::getAll();
        if(array_key_exists($id, $news)){
            return $news[$id];
        }
        return false;
    }
    public static function getCount(){
        return count(static::getAll());
    }
    public static function saveNews($news)
    {
        $allNews = static::getAll();
        $allNews[] = $news;
        $newAllNews = serialize($allNews);
        file_put_contents('data.php', $newAllNews);
    }


    /**
     * @param $id
     * @return bool|mixed одна категория по id
     */
    public static function getOneCategory($id)
    {
        foreach (static::getCategories() as $item) {
            if ($item['id'] == $id)
                return $item;
        }
        return false;
    }

    /**
     * @return array все новости
     */
    public static function getAll()
    {
        return unserialize(file_get_contents('data.php'));
    }

    /**
     * @return array getter для массива категорий
     */
    public static function getCategories()
    {
        return static::$categories;
    }

    /**
     * @param string $name
     * @return mixed
     * возвращает id категории по имени
     */
    public static function getIdByName(string $name)
    {
        foreach (static::$categories as $item) {
            if ($item['name'] === $name)
                return $item['id'];
        }
    }

    /**
     * @param string $categoryName
     * @return array
     * возвращает массив новостей по имени категории
     */
    public static function getNewsByCategory(string $categoryName)
    {
        $allNews = static::getAll();
        $id = static::getIdByName($categoryName);
        $news = [];
        foreach ($allNews as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }
}
