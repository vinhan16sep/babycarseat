<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuaranteeInfo extends Model
{
    use HasFactory;

    protected $table = 'guarantee_info';
    public $timestamps = true;

    protected $fillable = [
        'position',
        'sub_position',
        'title',            
        'content'
    ];
}
