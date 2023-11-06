<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SyntheticFilters\Traits\ResponseTrait;
use App\Models\Category;
use App\Models\Post;
use Faker\Factory as Faker;
use SyntheticFilters\Models\Filter;
use Illuminate\Support\Facades\Validator;

class FilterController extends Controller
{
    use ResponseTrait;
    public function getContent()
    {
        $posts = Post::sort()->filter()->with('category:name', 'user')->paginate(10);
        $posts->data = $posts->toFlatArray();
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $posts->toArray(),
            status: 200
        );
    }
    public function getContentStructure()
    {
        $table_structure = Config('table-structure');
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $table_structure,
            status: 200
        );
    }
    public function getFilterStructure()
    {
        $properties = new Post();
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $properties->filterData(),
            status: 200
        );
    }
    public function getFilterContent()
    {
        $properties = new Post();
        $this->log('success', 'Data Fetched successfully');
        $filter_data = Filter::where(['resource' => 'App\Models\Post', 'user_id' => '1'])->first() ?? Filter::where(['resource' => 'App\Models\Post', 'visibility' => true])->first();
        return $this->response(
            data: $filter_data ? $filter_data->toArray() : [],
            status: 200
        );
    }
    public function storeFilterContent(Request $request, $filter_id = null)
    {
        $request->merge([
            'resource' => Post::class,
            'resource_id' => '',
        ]);
        try {
            $validator = Validator::make($request->all(), [
                'filter_object' => 'required',
                'visibility' => 'required|boolean',
            ]);
            if ($validator->fails()) {
                $this->log('error', 'validation fails');
                return $this->response(
                    data: [],
                    status: 403
                );
            }
            if ($filter_id) {
                $data = Filter::find($filter_id);
                if ($data) {
                    $data->resource = $request->resource;
                    $data->resource_id = $request->resource_id;
                    $data->user_id = 1;
                    $data->filter_object = $request->filter_object;
                    $data->visiblity = $request->visibility;
                    $data->save();
                    $this->log('success', 'Filter data updated successfully');
                } else {
                    $this->log('error', 'Filter data not found');
                    return $this->response(
                        data: [],
                        status: 404
                    );
                }
            } else {
                $data = new Filter();
                $data->resource = $request->resource;
                $data->resource_id = $request->resource_id;
                $data->user_id = 1;
                $data->filter_object = $request->filter_object;
                $data->visiblity = $request->visibility;
                $data->save();
                $this->log('success', 'Filter data store successfully');
            }
            return $this->response(
                data: $data->toArray(),
                status: 404
            );
        } catch (\Exception $e) {
            $this->log('error', $e->getMessage());
            return $this->response(
                data: [],
                status: 500
            );
        }
    }
    public function deleteFilterContent($id)
    {
        try {
            $filter = Filter::find($id);
            if ($filter) {
                $filter->delete();
                $this->log('success', 'Filter data deleted successfully');
            } else {
                $this->log('error', 'Filter data not found');
                return $this->response(
                    data: [],
                    status: 404
                );
            }
            return $this->response(
                data: [],
                status: 200
            );
        } catch (\Exception $e) {
            $this->log('error', $e->getMessage());
            return $this->response(
                data: [],
                status: 500
            );
        }
    }
    public function getCategoryStructure()
    {
        $properties = new Category();
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $properties->filterData(),
            status: 200
        );
    }
    public function getCategoryRelationData()
    {
        $search_text = request('search_text');
        $categories = $search_text ?
            Category::where('name', 'like', '%' . $search_text . '%')
            ->select(['id', 'name', 'status'])
            ->simplePaginate(10)
            :
            Category::select(['id', 'name', 'status'])
            ->simplePaginate(10);
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $categories->toArray(),
            status: 200
        );
    }
    public function feedData()
    {
        $this->log('success', 'New Category and Post Data inserted successfully');
        $stat_arr = ['Active', 'Inactive', 'Pending', 'Rejected'];
        $index = array_rand($stat_arr);
        $random_status = $stat_arr[$index];
        $faker = Faker::create();
        $randomCategoryName = $faker->word();
        $category = new Category();
        $category->name = $randomCategoryName;
        $category->status = $random_status;
        $category->user_id = 1;
        $category->save();
        $post = new Post();
        $post->category_id = $category->id;
        $post->title = $faker->sentence();
        $post->status = $random_status;
        $post->user_id = 1;
        $post->description = $faker->paragraph();
        $post->save();
        return $this->response(
            data: [],
            status: 200
        );
    }
}
