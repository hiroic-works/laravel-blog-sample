<?php

namespace App\Models\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // use HasFactory;

    // テーブル名
    protected $table = 'blogs';

    // 可変項目
    // https://readouble.com/laravel/8.x/ja/eloquent.html 「複数代入」項目
    protected $fillable =
    [
        'title',
        'content'
    ]
}
