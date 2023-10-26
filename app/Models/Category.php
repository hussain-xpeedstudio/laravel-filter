<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use SyntheticFilters\Traits\FilterTrait;
class Category extends Model
{
    use HasFactory,FilterTrait;

    protected $fillable = [
        'name', 'status', 'user_id'
    ];

    public  $filterableAttributes=[
        'name'=>[
            'type'=>'text',
            'label'=>'Employee Name',
            'model'=>Document::class,
        ],
        'status'=>[
            'type'=>'select',
            'label'=>'Status',
            'isMultiSelect'=>1
        ],
        'user_id'=>[
            'type'=>'select',
            'label'=>'Employee ID',
            'isMultiSelect'=>1,
        ],
        
    ];
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
