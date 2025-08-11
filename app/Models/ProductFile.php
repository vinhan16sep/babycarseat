<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFile extends Model
{
    use HasFactory;

    protected $table = 'product_files';

    protected $fillable = [
        'product_id',
        'type',
        'file_name',
        'file_path',
        'is_active',
        'sort',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
