<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model 
{
    use HasFactory;

    protected $table = 'combo';
    public $timestamps = true;

    protected $fillable = array(
        'name', 'slug', 'image', 'description', 'content', 'price',
        'is_active', 'is_discount', 'discount_value', 'is_new', 'is_highlight', 
        'timestamps'
    );

    public function products(){
        return $this->belongsToMany(Product::class, 'combo_products', "combo_id", "product_id")->withPivot('quantity');
    }

}