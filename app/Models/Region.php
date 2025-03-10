<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model 
{
    use HasFactory;

    protected $table = 'regions';
    public $timestamps = true;

    protected $fillable = [
        'country_id',
        'name',
        'slug',
        'description',
        'is_active',
        'created_by',
        'updated_by'
    ];

    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}