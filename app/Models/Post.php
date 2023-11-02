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

    // public function __call($method, $parameters)
    // {
    //     return parent::__call($method, $parameters);
    //     // dd($this->getRelations());
    //     // $user = \App\Models\Post::class;
    //     // $reflector = new \ReflectionClass($user);
    //     // $relations = [];
    //     // foreach ($reflector->getMethods() as $reflectionMethod) {
    //     //     $returnType = $reflectionMethod->getReturnType();
    //     //     dd($returnType, $reflectionMethod);
    //     //     if ($returnType) {
    //     //         if (in_array(class_basename($returnType->getName()), ['HasOne', 'HasMany', 'BelongsTo', 'BelongsToMany', 'MorphToMany', 'MorphTo'])) {
    //     //             $relations[] = $reflectionMethod;
    //     //         }
    //     //     }
    //     // }
    //     return true;

    //     // dd($relations);
    // }
    // public static function definedRelations(): array
    // {
    //     $reflector = new \ReflectionClass(get_called_class());

    //     return collect($reflector->getMethods())
    //         ->filter(
    //             fn ($method) => !empty($method->getReturnType()) &&
    //                 str_contains(
    //                     $method->getReturnType(),
    //                     'Illuminate\Database\Eloquent\Relations'
    //                 )
    //         )
    //         ->pluck('name')
    //         ->all();
    // }

    // protected $appends = ['category_name'];

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
        ],
        'category_id' => [
            'type' => self::SELECT,
            'label' => 'Category',
            'model' => Category::class,
            'isMultiSelect' => false,
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

    // public function getCategoryNameAttribute()
    // {
    //     return $this->category->name;
    // }
}
