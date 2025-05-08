<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'image',
        'position',
        'sort',
        'description',
        'content',
        'is_active',
        'menu_active',
        'created_by',
        'updated_by'
    ];

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }
}
