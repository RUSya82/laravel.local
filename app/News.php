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
    public static function getOne($id){
        static::$news = include 'data.php';
        foreach(static::$news as $item){
            if($item['id'] == $id)
                return $item;
        }
        return false;
    }

    /**
     * @param $id
     * @return bool|mixed одна категория по id
     */
    public static function getOneCategory($id){
        foreach (static::getCategories() as $item){
            if($item['id'] == $id)
                return $item;
        }
        return false;
    }

    /**
     * @return array все новости
     */
    public static function getAll(){
        static::$news = include 'data.php';
        return static::$news;
    }

    /**
     * @return array getter для массива категорий
     */
    public static function getCategories(){
        return static::$categories;

    }

    /**
     * @param string $name
     * @return mixed
     * возвращает id категории по имени
     */
    public static function getIdByName(string $name){
        foreach (static::$categories as $item){
            if($item['name'] === $name)
                return $item['id'];
        }
    }

    /**
     * @param string $categoryName
     * @return array
     * возвращает массив новостей по имени категории
     */
    public static function getNewsByCategory(string $categoryName){
        static::$news = include 'data.php';
        $id = static::getIdByName($categoryName);
        $news = [];
        foreach (static::$news as $item){
            if($item['category_id'] === $id){
                $news[] = $item;
            }
        }
        return $news;
    }
}
