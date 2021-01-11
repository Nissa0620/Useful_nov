<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // このカテゴリが当てはまる投稿
    public function microposts()
    {
        return $this->hasMany(Micropost::class);
    }

    // このカテゴリが関係するモデルの件数をロードする
    public function loadRelationshipCounts()
    {
        $this->loadCount('microposts');
    }
}
