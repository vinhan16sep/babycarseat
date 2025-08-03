<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
