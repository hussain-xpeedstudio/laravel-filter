<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use SyntheticFilters\Traits\FilterTrait;
use App\Observers\ToFlatArray;

class Post extends Model
{
    use HasFactory, FilterTrait;
    public static  $all_relation = ['category', 'test'];
    protected $fillable = ['title', 'description', 'status', 'user_id', 'category_id'];
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
    protected static function boot()
    {
        parent::boot();
        static::observe(ToFlatArray::class);
        //self::$all_relation=self::getRelationNames();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function toFlatArray()
    {
        $data = parent::toArray();
        foreach (self::$all_relation as $relation) {
            $val = $this->{$relation}->name ?? '';
            $this->setAttribute($relation . '_name', $val);
            if (array_key_exists($relation, $this->attributes)) {
                unset($this->attributes[$relation]);
            }
        }
        return $data;
    }
}
