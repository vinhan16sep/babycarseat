<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $table = 'feature';
    public $timestamps = true;

    protected $fillable = [
        'label',
        'title',
        'sub_title',
        'slug',
        'image',
        'sort_content',
        'content',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
