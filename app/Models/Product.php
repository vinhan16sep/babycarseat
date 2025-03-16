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
        'category_id',
        'brand_id',
        'name',
        'slug',
        'image',
        'description',
        'content',
        'quantity',
        'price',
        'is_active',
        'is_discount',
        'discount_value',
        'is_new',
        'is_highlight',
        'timestamps'
    );
    protected $appends = ['images'];

    public function categoryId()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function productColors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function getImageAttribute($value)
    {
        $images = json_decode($value, true);
        return $images[0] ?? "";
    }

    public function getImagesAttribute()
    {
        if (!empty($this->attributes["image"])) {
            return json_decode($this->attributes["image"], true);
        } else {
            return [];
        }
    }

    public function getImageForListAttribute() {
        if (!$this->productColors->isEmpty()) {
            $image = $this->productColors[0]->image;
            $imageHover = $this->productColors[1]->image ?? $image;
        }

        return [
            'image' => $image ?? null,
            'image_hover' => $imageHover ?? null,
        ];
    }
}
