<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryMapping extends Model
{
    use HasFactory;

    protected $table = 'product_categories_mapping';
    public $timestamps = true;

    protected $fillable = [
        'product_id',
        'category_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function feature()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
