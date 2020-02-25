<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    /**
     * вернёт одну новость по id
     * @param $id
     * @return bool|mixed
     */
    public static function getOne($id)
    {
        $feedbacks = static::getAll();
        if(array_key_exists($id, $feedbacks)){
            return $feedbacks[$id];
        }
        return false;
    }

    /**
     * @return int - количество отзывов
     */
    public static function getCount(){
        return count(static::getAll());
    }

    /**
     * @param $feedbacks
     * @return bool
     * Сохранение отзыва в файл
     */
    public static function saveFeedbacks($feedbacks)
    {
        $allFeedbacks = static::getAll();
        $allFeedbacks[] = $feedbacks;
        $newallFeedbacks = serialize($allFeedbacks);
        if(file_put_contents('feedbacks.php', $newallFeedbacks)){
            return true;
        }
        return false;
    }


    /**
     * @return array все отзывы
     */
    public static function getAll()
    {
        $data = file_get_contents('feedbacks.php');
        if(!$data){
            return unserialize($data);
        }
        return [];
    }
}
