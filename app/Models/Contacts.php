<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'content',
        'created_by',
        'updated_by'
    ];
}
