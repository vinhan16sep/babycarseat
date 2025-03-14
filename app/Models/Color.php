<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'code'
    ];

    public function productColors()
    {
        return $this->hasMany(ProductColor::class);
    }
}
