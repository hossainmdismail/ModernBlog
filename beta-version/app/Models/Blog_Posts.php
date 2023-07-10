<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'sub_category_id',
        'title',
        'photo',
        'content',
        'views',
        'premium',
        'status',
    ];

    function rel_to_cat(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
