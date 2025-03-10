<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoryCategory extends Model
{
    use HasFactory;

    protected $table = 'accessory_category';
    public $timestamps = true;

    protected $fillable = [
        'image',
        'name',
        'slug',
        'description',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
