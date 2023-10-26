<?php

namespace SyntheticFilters\Traits;

use Illuminate\Http\Request;
use Abbasudo\Purity\Traits\Filterable as PurityFilterTrait;
use Abbasudo\Purity\Traits\Sortable as   PuritySortTrait;

trait FilterTrait
{
    use PurityFilterTrait, AttributeType;
    use PuritySortTrait;
    protected $resource;
    protected $filterFields;

    public function __construct()
    {
        $this->filterFields = empty($this->filterableAttributes) ? [] : array_keys($this->filterableAttributes);
    }

    private function getOptionData($modelClass)
    {
        $rowLimit = config('synthetic-filter.row_limit');
        $columnLimit = config('synthetic-filter.column_limit');
        $databaseConnection = env('DB_CONNECTION');
        if ($databaseConnection === 'mysql') {
            $model = new $modelClass;
            $data['data'] = $model->distinct('id')->take($rowLimit)->get($columnLimit);
        } elseif ($databaseConnection == 'mongodb') {
            $model = new $modelClass;
            $data['data'] = $model->limit($rowLimit)->get();
        } else {
            $data['data'] = [];
        }
        $data['resource'] = $this->resource;

        return $data;
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
            $optionData = [];
            if (!empty($value['model'])) {
                $optionData = $this->getOptionData($value['model']);
                $this->resource = $value['model'];
            } else {
                $this->resource = $className;
            }
            $optionData = !empty($value['model']) ? $this->getOptionData($value['model']) : [];
            $data[$key] = [
                'label' => $value['label'] ?? '',
                'type' => $value['type'],
                'optionsData' => $optionData,
                'isMultiSelect' => $value['isMultiSelect'] ?? TRUE
            ];
        }
        $result['fields'] = $data;
        $result['currentEndpoint'] = Request::capture()->getRequestUri();
        $result['optionDataEndpoint'] = '/api/filters/option/data';
        return $result;
    }
}
