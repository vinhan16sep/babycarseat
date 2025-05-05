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
        'image',
        'position',
        'sort',
        'description',
        'content',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
