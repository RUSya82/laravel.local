<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App
 * @property string title
 * @property string content
 * @property int category_id
 * @property int isModerated
 * @property string image
 * @property string author
 * @property int created_at
 * @property int updated_at
 */
class News extends Model
{

    protected $table = 'news';

    protected $guarded = ['id', 'isModerated', 'created_at', 'updated_at'];

    public  function category() {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }

    public static function rules() {
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => 'required|min:10|max:70',
            'content' => 'required|min:20|max:5000',
            'category_id' => "required|exists:{$tableNameCategory},id",
            //'image' => 'mimes:jpeg,bmp,png|max:1000'
        ];
    }

    public static function attributeNames() {
        return [
            'title' => 'Заголовок новости',
            'content' => 'Текст новости',
            'category_id' => "Категория новости",
            'image' => "Изображение"
        ];
    }
}
