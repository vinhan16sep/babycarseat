<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSafe extends Model
{
    use HasFactory;

    protected $table = 'formsafe';
    public $timestamps = true;

    protected $fillable = array(
        'name',
        'phone',
        'email',
        'address',
        'product_code',
        'by_date',
        'report_images',
        'env_images',
        'created_at',
        'code'
    );

}
