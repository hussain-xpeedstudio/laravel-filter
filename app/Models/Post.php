<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use SyntheticFilters\Traits\FilterTrait;

class Post extends Model
{
    use FilterTrait, HasFactory;
    protected $fillable = ['title', 'description', 'status', 'user_id', 'category_id'];
    public $filterableAttributes = [
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
            'isMultiSelect' => true,
        ],
        'user_id' => [
            'type' => self::SELECT,
            'label' => 'Employee ID',
            'isMultiSelect' => true,
            //relation
            'relation' => 'user',
        ],
        'category_id' => [
            'type' => self::SELECT,
            'label' => 'Category',
            'model' => Category::class,
            'isMultiSelect' => false,
            //relation
            'relation' => 'category',
            'relationField' => [
                'name', 'status'
            ]
        ],

    ];
    protected $sortFields = [
        'title', 'description', 'status', 'user_id', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     protected function getValidRelations()
    {
        return [
            'category_id' => [
                'relationWith' => 'category',
                'relationColumn' => [
                    'name', 'status'
                ]
            ]
        ];
    }
}
