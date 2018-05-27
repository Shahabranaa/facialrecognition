<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    protected $table= 'article_images';

    protected $guarded=['id'];

    public function Article(){
        return $this->belongsTo('App\Article');
    }
}
