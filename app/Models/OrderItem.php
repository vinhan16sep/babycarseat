<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = array(
        'order_id',
        'product_id',
        'color_id',
        'quantity',
        'price',
        'color_id'
    );

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
