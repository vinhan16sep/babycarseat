<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $table = 'agencies';
    public $timestamps = true;

    protected $fillable = [
        'city_id',
        'name',
        'address',
        'map',
        'phone',
        'sort',
        'is_active',
        'created_by',
        'updated_by'
    ];

    public function city() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
