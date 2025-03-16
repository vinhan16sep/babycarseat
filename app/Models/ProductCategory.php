<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
        'created_by',
        'updated_by'
    ];

    public function products() {
        return $this->hasMany(Product::class, 'category_id');
    }
}
