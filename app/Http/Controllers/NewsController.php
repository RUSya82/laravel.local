<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $categories = [
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

    public $news = [
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

    /**
     *
     * @param array $Arr
     * @param $param
     * @param string $paramname
     * @return array - массив массивов, отобранных по имени параметра $paramname
     */
    public function getArrayById(array $Arr, $param, string $paramname = 'id'){
        $result =[];
        foreach ($Arr as $element){
            if($element[$paramname] == $param){
                $result[] = $element;
            }
        }
        return $result;
    }



    public function index(){
        $html = <<<php
<nav>
    <a href="/">Главная</a>
    <a href="/admin">АДминка</a>
    <a href="/news">Новости</a>
    <a href="/about">о Нас</a>
</nav>
php;
        foreach ($this->categories as $category){
            $html .= "<a href=\"news/category/{$category['id']}\">{$category['description']}</a><br>";
        }
        return $html;

    }




    public function categoryOne($category_id){
        $news = $this->getArrayById($this->news, $category_id, 'category_id');
        $html = <<<php
<nav>
    <a href="/">Главная</a>
    <a href="/admin">АДминка</a>
    <a href="/news">Новости</a>
    <a href="/about">о Нас</a>
</nav>
php;
        foreach ($news as $new){
            $html .= "<h2><a href='/news/newsone/{$new['id']}'>{$new['title']}</a></h2><hr>";
            //$html .= "<p>{$new['content']}</p><hr>";
        }
        return $html;

    }



    public function newsOne(int $id){
        $news = $this->getArrayById($this->news, $id)[0];
       // dd($news);
        $html = <<<php
<nav>
    <a href="/">Главная</a>
    <a href="/admin">АДминка</a>
    <a href="/news">Новости</a>
    <a href="/about">о Нас</a>
</nav>
php;
        $html .= <<<php
<h2>{$news['title']}</h2><br>
<p>{$news['content']}</p>
php;
    return $html;
    }


}
