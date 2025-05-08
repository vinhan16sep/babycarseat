<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Removed unused import
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = 'post_category';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'level',
        'created_by',
        'updated_by'
    ];

    public function parent()
    {
        return $this->belongsTo(PostCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(PostCategory::class, 'parent_id');
    }

    /*
     * ---------------------
     * Accessors
     * ---------------------
     */

     public function getDisplayNameAttribute()
     {
         $names = [$this->name];
         $parent = $this->parent;
     
         while ($parent) {
             array_unshift($names, $parent->name);
             $parent = $parent->parent;
         }
     
         return implode(' -- ', $names);
     }
     

    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }

            if ($category->parent_id) {
                $parent = PostCategory::find($category->parent_id);
                if ($parent && $parent->level < 3) {
                    $category->level = $parent->level + 1;
                } else {
                    throw new \Exception('Không thể chọn danh mục cấp 3 làm cha');
                }
            } else {
                $category->level = 1;
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name')) {
                $category->slug = Str::slug($category->name);
            }

            if ($category->isDirty('parent_id')) {
                if ($category->parent_id) {
                    $parent = PostCategory::find($category->parent_id);
                    if ($parent && $parent->level < 3) {
                        $category->level = $parent->level + 1;
                    } else {
                        throw new \Exception('Không thể chọn danh mục cấp 3 làm cha');
                    }
                } else {
                    $category->level = 1;
                }
            }
        });
    }

    /*
     * ---------------------
     * Scopes
     * ---------------------
     */

    public function scopeSelectableParents($query)
    {
        return $query->where('level', '<=', 2)
                     ->with('parent')
                     ->orderBy('name');
    }

    public function scopeRootCategories($query)
    {
        return $query->whereNull('parent_id')->with('children');
    }
}
