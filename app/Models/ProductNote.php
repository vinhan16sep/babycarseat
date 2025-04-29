<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductNote extends Model
{
    use HasFactory;

    protected $table = 'product_notes';
    public $timestamps = true;

    protected $fillable = [
        'product_id',
        'note_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}
