<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{
    use HasFactory;

    protected $table = 'products';
    public $timestamps = true;

    protected $fillable = array(
        'country_id', 'region_id', 'type_id', 'grape_id', 
        'name', 'slug', 'image', 'description', 'content', 
        'quantity', 'price', 'alcohol', 'capacity', 
        'is_active', 'is_discount', 'discount_value', 
        'is_new', 'is_highlight', 
        'timestamps'
    );
    protected $appends = ['images'];

    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function region() {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function type() {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function grape() {
        return $this->belongsTo(Grape::class, 'grape_id', 'id');
    }

    public function getImageAttribute($value) {
        $images = json_decode($value, true);
        return $images[0] ?? "";
    }

    public function getImagesAttribute() {
        if(!empty($this->attributes["image"])) {
            return json_decode($this->attributes["image"], true);
        } else {
            return [];
        }
    }

}