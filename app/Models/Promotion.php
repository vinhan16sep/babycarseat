<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotions';
    public $timestamps = true;

    protected $fillable = [
        'item_id',
        'item_type',
        'title',
        'image',
        'is_highlight',
        'is_active',
        'created_by',
        'updated_by'
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'item_id', 'id');
    }

    public function combo() {
        return $this->belongsTo(Combo::class, 'item_id', 'id');
    }
}
