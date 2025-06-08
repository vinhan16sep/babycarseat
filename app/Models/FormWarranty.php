<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormWarranty extends Model
{
    use HasFactory;

    protected $table = 'formwarranty';
    public $timestamps = true;

    protected $fillable = array(
        'name',
        'phone',
        'email',
        'product_code',
        'by_date',
        'bill_images',
        'created_at',
        'code',
    );

}
