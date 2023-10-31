<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use SyntheticFilters\Traits\FilterTrait;

class Post extends Model
{
    use HasFactory, FilterTrait;

    protected $fillable = ['title', 'description', 'status', 'user_id', 'category_id'];
    // public function __construct()
    // {
    //     $this->fillable = array_merge($this->fillable, array_keys($this->filterableAttributes));
    // }
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
    protected $sortFields = [
        'title', 'description', 'status', 'user_id', 'category_id'
      ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
