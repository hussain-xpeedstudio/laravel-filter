<?php

namespace SyntheticFilters\Controllers;

use App\Models\Post;
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

    /**
     * Display a listing of the resource.
     */
    public function getRulesList()
    {
        try {
            $this->log('success', 'Data Fetched successfully');
            return $this->response(
                data: config('synthetic-filter.allRules'),
                status: 200
            );
        } catch (\Exception) {
            $this->log('success', 'Something went wrong');
            return $this->response(
                data: [],
                status: 500
            );
        }
    }
    public function getStructure($segment)
    {
        // try{
        //     $model='App\Models\\'. ucfirst(Str::camel(Str::singular($segment)));
        //     return $this->test($model);
        // }
        // catch(\Exception $e){
        //     $this->log('error', $e->getMessage());
        //     return $this->response(
        //         data:[],
        //         status: 500
        //     );
        // }
        $model = 'App\Models\\' . ucfirst(Str::camel(Str::singular($segment)));
        // dd($model);
        //return $model=app($model);
        return $this->test($model);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filterStructureGET($filter)
    {
        $posts = Post::sort()->filter()->withoutEagerLoads()->paginate(10);
        $posts->data = $posts->toFlatArray();
        return $this->response(
            data: $posts->toArray(),
            status: 200
        );
        // dd($post, Post::getValidRelations());
        // foreach (Post::getValidRelations() as $relation) {
        //     if (array_key_exists('relationField', $relation)) {
        //         foreach ($relation['relationField'] as $key => $value) {
        //             dd($post);
        //             $post->{$relation['relation'] . '_' . $value} = $post->{$relation['relation']}->$value;
        //             dd($post);
        //         }
        //     }
        //     // else {
        //     //     dd('nnnnnnnn');
        //     // }
        //     // if (!$post->has($relation)) {
        //     //     dd('not found');
        //     // } else {
        //     //     $post->{$relation . '_name'} = $post->$relation->name;
        //     //     dd('found', $post);
        //     // }
        // }
        // dd(Post::getValidRelations(['category']));
        // $filter = Filter::where('resource_id', $filter)->first();
        // if ($filter) {
        //     $this->log('success', 'Data fetch successfully');

        //     return $this->response(
        //         data: $filter->toArray(),
        //         status: 200
        //     );
        // } else {
        //     $this->log('error', 'Data not found');

        //     return $this->response(
        //         data: [],
        //         status: 400
        //     );
        // }
    }

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
