<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SyntheticFilters\Traits\FilterTrait;
class Test extends Model
{
    use HasFactory,FilterTrait;
    public  $filterableAttributes = [
        'title' => [
            'type' => self::TEXT,
            'label' => 'Title',
        ],
        'description' => [
            'type' => self::TEXT,
            'label' => 'Title',
        ],
        

    ];
}
