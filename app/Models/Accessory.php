<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model 
{
    use HasFactory;

    protected $table = 'accessories';
    public $timestamps = true;

    protected $fillable = array(
        'accessory_category_id',
        'name', 'slug', 'image', 'description', 'content', 'price', 
        'is_active', 'is_new', 'is_highlight', 
        'timestamps'
    );

    public function category() {
        return $this->belongsTo(AccessoryCategory::class, 'accessory_category_id', 'id');
    }

}