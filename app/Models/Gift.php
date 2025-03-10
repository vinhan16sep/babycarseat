<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $table = 'gifts';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'image',
        'price',
        'description',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
