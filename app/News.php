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
}
