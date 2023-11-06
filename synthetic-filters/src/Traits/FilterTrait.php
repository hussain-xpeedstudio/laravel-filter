<?php

namespace SyntheticFilters\Traits;

use Abbasudo\Purity\Traits\Filterable as PurityFilterTrait;
use Abbasudo\Purity\Traits\Sortable as PuritySortTrait;
use Illuminate\Support\Str;
use SyntheticFilters\Models\CustomCollection;

trait FilterTrait
{
    use AttributeType;
    use PurityFilterTrait;
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
        $data = [];
        foreach ($filterAttribute as $key => $value) {
            $endPoint = '';

            if (!empty($value['model'])) {
                $endPoint = '/api/post/relation/' . Str::snake(class_basename($value['model'])) . '/list';
            }
            $data[$key] = [
                'label' => $value['label'] ?? '',
                'type' => $value['type'],
                'optionsData' => $endPoint,
                'isMultiSelect' => $value['isMultiSelect'] ?? true,
            ];
        }
        return $data;
    }
    public function newCollection(array $models = [])
    {
        return new CustomCollection($models);
    }
}
