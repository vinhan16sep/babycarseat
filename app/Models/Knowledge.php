<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    use HasFactory;

    protected $table = 'knowledges';
    public $timestamps = true;

    protected $fillable = [
        'knowledge_category_id',
        'title',
        'slug',
        'image',
        'description',
        'content',
        'is_active',
        'created_by',
        'updated_by'
    ];

    public function category() {
        return $this->belongsTo(KnowledgeCategory::class, 'knowledge_category_id', 'id');
    }
}
