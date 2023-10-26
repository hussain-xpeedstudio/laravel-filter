<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use SyntheticFilters\Traits\FilterTrait;

class Post extends Model
{
    use HasFactory;
    use HasFactory, FilterTrait;

    protected $fillable = [];
    public function __construct()
    {
        $this->fillable = array_merge($this->fillable, array_keys($this->filterableAttributes));
    }
    public  $filterableAttributes = [
        'title' => [
            'type' => self::TEXT,
            'label' => 'Title',
        ],
        'description' => [
            'type' => self::TEXT,
            'label' => 'Title',
        ],
        'status' => [
            'type' => self::SELECT,
            'label' => 'Status',
            'isMultiSelect' => TRUE
        ],
        'user_id' => [
            'type' => self::SELECT,
            'label' => 'Employee ID',
            'isMultiSelect' => TRUE,
        ],
        'category_id' => [
            'type' => self::SELECT,
            'label' => 'Category',
            'model' => Category::class,
            'isMultiSelect' => FALSE,
        ],

    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
