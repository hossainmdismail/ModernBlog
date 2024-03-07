<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    use HasFactory;
    protected $fillable =[
        'category_id',
        'photo',
        'name',
        'meta_title',
        'meta_tags',
        'meta_descp',
    ];

    // category relation
    function rel_to_category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
