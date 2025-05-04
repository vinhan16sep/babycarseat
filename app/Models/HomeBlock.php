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

    public static function getDataByType($type) {
        return HomeBlock::query()->where("type", $type)->where("is_active", 1)->get();
    }
}
