<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use SyntheticComments\trait\CommentTrait;
use SyntheticFilters\Traits\FilterTrait;
use SyntheticRevisions\trait\RevisionableTrait;

class Document extends Model
{
    use CommentTrait, FilterTrait,HasFactory,RevisionableTrait;

    protected $fillable = [
        'name', 'description', 'user_id',
    ];

    public $filterableAttributes = [
        'name' => [
            'type' => 'text',
            'label' => 'Employee Name',
            'model' => Document::class,
        ],
        'designation' => [
            'type' => 'select',
            'label' => 'Designation',
            'model' => Document::class,
            'isMultiSelect' => 1,
        ],
        'role' => [
            'type' => 'select',
            'label' => 'Role',
            'isMultiSelect' => 1,
        ],
        'category' => [
            'type' => 'select',
            'label' => 'Category',
            'isMultiSelect' => 1,
        ],
    ];

}
