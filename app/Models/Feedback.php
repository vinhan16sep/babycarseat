<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    public $timestamps = true;

    protected $fillable = [
        'image',
        'description',
        'rate',
        'rate_by',
        'link',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
