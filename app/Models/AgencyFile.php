<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyFile extends Model
{
    use HasFactory;

    protected $table = 'agency_files';

    protected $fillable = [
        'agency_id',
        'type',
        'file_name',
        'file_path',
        'is_active',
        'sort',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
