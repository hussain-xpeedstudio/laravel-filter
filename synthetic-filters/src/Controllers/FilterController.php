<?php

namespace SyntheticFilters\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SyntheticFilters\Models\Filter;
use SyntheticFilters\Traits\FilterTrait;
use SyntheticFilters\Traits\ResponseTrait;
use Validator;

class FilterController
{
    use FilterTrait;
    use ResponseTrait;

    public function filterStructureSave(Request $request, $table, $table_id)
    {
        $request->merge([
            'resource' => $table,
            'resource_id' => $table_id,
        ]);

        $validator = Validator::make($request->all(), [
            'filter_object' => 'required',
            'resource' => 'required|string',
            'resource_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('validation_fails', 'validation fails');
        }

        $data = new Filter();
        $data->resource = $request->resource;
        $data->resource_id = $request->resource_id;
        $data->user_id = 'test_by_bijoy';
        $data->filter_object = $request->filter_object;
        $data->visiblity = true;

        if ($data->save()) {
            $this->log('success', 'Filter data store successfully');
            return $this->response(
                data: $data->toArray(),
                status: 200
            );
        }
    }
}
