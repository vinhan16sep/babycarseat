<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QAs extends Model
{
    use HasFactory;

    protected $table = 'qas';
    public $timestamps = true;

    protected $fillable = array(
        'qa_type',
        'question',
        'answer',
        'sort',
        'is_active'
    );

    /**
     * Get the next sort value for a given qa_type.
     *
     * @param string $qaType
     * @return int
     */
    /**
     * Get the next sort value for a given qa_type.
     *
     * @param string $qaType
     * @return int
     */
    public function getNextSortValue($qaType)
    {
        $maxSort = self::where('qa_type', $qaType)
            ->max('sort');

        // If no records found, return 1
        return $maxSort ? $maxSort + 1 : 1;
    }

    // get all active QAs by qa_type
    public function getActiveQAsByType($qaType)
    {
        return self::where('qa_type', $qaType)
            ->where('is_active', 1)
            ->orderBy('sort', 'asc')
            ->get();
    }
    
}
