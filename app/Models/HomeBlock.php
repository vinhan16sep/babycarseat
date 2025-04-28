<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBlock extends Model
{
    use HasFactory;

    protected $table = 'home_blocks';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'link',
        'image',
        'icon',
        'type',
        'short_description',
        'description',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
