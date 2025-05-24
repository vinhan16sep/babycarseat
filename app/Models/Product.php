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

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors')
            ->withPivot('id')
            ->withTimestamps();
    }

    public function notes()
    {
        return $this->belongsToMany(Note::class, 'product_notes')
            ->withPivot('id')
            ->withTimestamps();
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'product_feature')
            ->withPivot('id')
            ->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_categories_mapping', 'product_id', 'category_id');
    }

    public function getImagesAttribute()
    {
        if (!empty($this->attributes["image"])) {
            return json_decode($this->attributes["image"], true);
        } else {
            return [];
        }
    }

    public function getImageForListAttribute()
    {
        if (!$this->productColors->isEmpty()) {
            $image = $this->productColors[0]->image;
            $imageHover = $this->productColors[1]->image ?? $image;
        }

        return [
            'image' => $image ?? null,
            'image_hover' => $imageHover ?? null,
        ];
    }

    public static function getHotProducts() {
        return Product::query()->with(['categoryId'])->where('is_active', 1)->where('is_highlight', 1)->get();
    }

    public function getFirstCategoryAttribute()
    {
        // Nếu categories đã được eager load thì lấy từ collection, không query
        if ($this->relationLoaded('categories')) {
            return $this->categories->first();
        }

        // Nếu chưa eager load thì query thêm (tuỳ trường hợp)
        return $this->categories()->first();
    }
}
