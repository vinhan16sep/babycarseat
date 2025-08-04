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
        'image',
        'name',
        'slug',
        'type_id',
        'disp_name',
        'description',
        'created_by',
        'updated_by'
    ];

    public function products() {
        return $this->belongsToMany(Product::class, 'product_categories_mapping', 'category_id', 'product_id');
    }

    public function type() {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
