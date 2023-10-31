<?php

namespace SyntheticFilters\Traits;

use Illuminate\Http\Request;
use Abbasudo\Purity\Traits\Filterable as PurityFilterTrait;
use Abbasudo\Purity\Traits\Sortable as   PuritySortTrait;
use Illuminate\Support\Str;
trait FilterTrait
{
    use PurityFilterTrait,AttributeType;
    use PuritySortTrait;
    protected $resource;
    protected $filterFields;

    public function __construct()
    {
        $this->filterFields = empty($this->filterableAttributes) ? [] : array_keys($this->filterableAttributes);
        
    }
    public function filterData()
    {
        $className = get_class($this);
        $reflection = new \ReflectionClass($className); // Replicated class
        $property = $reflection->getProperty('filterableAttributes');
        $property->setAccessible(true);
        $filterAttribute = $property->getValue($this);
        $data = array();
        foreach ($filterAttribute as $key => $value) {
            $endPoint='';
            if (!empty($value['model'])) {
                $endPoint='/api/post/relation/'.Str::snake(class_basename($value['model'])).'/list';
            } 
            $data[$key] = [
                'label' => $value['label'] ?? '',
                'type' => $value['type'],
                'optionsData' =>$endPoint,
                'isMultiSelect' => $value['isMultiSelect'] ?? TRUE
            ];
        }
        return $data;
    }
    public function test($className){
        $instance=app($className);
        $reflection = new \ReflectionClass($instance); // Replicated class
        $property = $reflection->getProperty('filterableAttributes');
        $property->setAccessible(true);
        $filterAttribute = $property->getValue($instance);
        $data = array();
        foreach ($filterAttribute as $key => $value) {
            $endPoint='';
            if (!empty($value['model'])) {
                $endPoint='/api/post/relation/'.Str::snake(class_basename($value['model'])).'/list';
                
            } 
            $data[$key] = [
                'label' => $value['label'] ?? '',
                'type' => $value['type'],
                'optionsData' =>$endPoint,
                'isMultiSelect' => $value['isMultiSelect'] ?? TRUE
            ];
        }
        return $data;
    }
}
