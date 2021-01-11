<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content','category_id'];


    //この投稿を所有するユーザ
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // この投稿のカテゴリー
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
