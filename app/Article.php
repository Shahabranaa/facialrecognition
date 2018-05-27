<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table ='articles';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->hasMany('App\ArticleImage','article_id','id');
    }
}
