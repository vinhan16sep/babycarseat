<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    public $timestamps = true;

    protected $fillable = [
        'location',
        'parent_id',
        'position',
        'title',
        'link',
        'sort',
        'is_active',
        'created_by',
        'updated_by',
    ];
    
    protected $attributes = [
        'location' => 1,
        'parent_id' => null,
        'sort' => 0,
    ];
}
