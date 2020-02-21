<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public static $categories = [
        [
            'id' => 1,
            'name' => 'Sport',
            'description' => "Новости спорта"
        ],
        [
            'id' => 2,
            'name' => 'Govenment',
            'description' => "Политика"
        ],
        [
            'id' => 3,
            'name' => 'nature',
            'description' => "Природа"
        ]
    ];

    public static $news = [
        [
            'id' => 1,
            'title' => 'Противник российского спорта обрушился с критикой на шведских допингистов',
            'category_id' => 1,
            'content' => "Шведский биатлонист Себастьян Самуэльссон, выступающий против участия российских спортсменов в международных соревнованиях, раскритиковал уличенных в употреблении допинга соотечественников. Его слова приводит Sport Bladet.

Самуэльссон заявил, что раздражен информацией о делах против чемпионки мира по вольной борьбе Йенни Франссон и победителя первенства Европы по кроссу Робела Фсиху. «Это печальная новость для шведского спорта. Это подрывает доверие к шведской антидопинговой программе. Я считал, что наша страна стоит в первых рядах в борьбе с допингом», — посчитал он"
        ],
        [
            'id' => 2,
            'title' => 'Кремль отреагировал на слухи о плане Путина по созданию сверхдержавы',
            'category_id' => 2,
            'content' => "Президент России Владимир Путин не предлагал белорусскому коллеге Александру Лукашенко объединить возглавляемые ими государства, заявил РИА Новости пресс-секретарь российского лидера Дмитрий Песков.

«Это не так, они говорили об углублении союзной интеграции», — сказал официальный представитель Кремля."
        ],
        [
            'id' => 3,
            'title' => 'title3',
            'category_id' => 1,
            'content' => "Новость про политику №1"
        ],[
            'id' => 4,
            'title' => 'title4',
            'category_id' => 2,
            'content' => "Новость про политику №2"
        ],[
            'id' => 5,
            'title' => 'title5',
            'category_id' => 3,
            'content' => "Новость про экологию №1"
        ],[
            'id' => 6,
            'title' => 'title6',
            'category_id' => 3,
            'content' => "Новость про экологию №2"
        ],[
            'id' => 7,
            'title' => 'title7',
            'category_id' => 1,
            'content' => "Новость спорта №3"
        ]
    ];
    public static function getOne($id){
        foreach(static::$news as $item){
            if($item['id'] == $id)
                return $item;
        }
        return false;
    }
    public static function getAll(){
        return static::$news;
    }


    private static function getIdByName(string $name){
        foreach (static::$categories as $item){
            if($item['name'] === $name)
                return $item['id'];
        }
    }
    public static function getNewsByCategory(string $categoryName){
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
