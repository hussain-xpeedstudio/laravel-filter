<?php

namespace App\Http\Controllers;

use App\Models\Category;
// use SyntheticFilters\Traits\FilterTrait;
use App\Models\Post;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use SyntheticFilters\Traits\ResponseTrait;

class FilterController extends Controller
{
    use ResponseTrait;

    public function getPostTableData()
    {
        $posts = Post::sort()->filter()->with('category:name', 'user')->paginate(10);
        $posts->data = $posts->toFlatArray();
        // dd($posts->items()[0]->getRelations()->setAttribute([
        //     'asdfsd', 'saffdsd'
        // ]));
        // $posts->items()[0]->setAttribute('asdfsd', 'saffdsd');
        // dd($posts['data']->getRelations());
        // $posts = Post::sort()->filter()->paginate(10)->get();

        // foreach ($posts as $key => $value) {
        //     $flattenedArray[] = $this->flattenArray($value);
        // }

        // dd($posts);
        // $result = collect($posts)
        //     ->map(function ($item) {
        //         dd($item);
        //     })
        //     ->flatten()
        //     ->toArray();
        // dd($result);
        // dd($posts['data']->getRelations());
        // $end_time = microtime(true);
        // $execution_time = ($end_time - $start_time);
        // \Illuminate\Support\Facades\Log::info("Script execution time: $execution_time seconds");
        // dd($flattenedArray, $execution_time);

        // dd(Arr::flatten($posts));
        // $posts = $posts->flattenTree('category')->toArray();
        // dd($flattened);
        // $posts['data'] = collect($posts['data'])->map(function ($post) {
        //     if (isset($post['category'])) {
        //         $post['cname'] = $post['category']['name'];
        //         unset($post['category']);
        //     }
        //     return $post;
        // })->toArray();

        // dd($posts);
        // $data = collect($posts['data'])->pluck('category');
        // dd($data);
        // $data = collect($posts['data'])->mapWithKeys(function ($item) {

        //     return [
        //         '_id' => $item['_id'],
        //         'title' => $item['title']
        //     ];
        // });
        // dd($data->all());
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $posts->toArray(),
            status: 200
        );
    }
    public function getPostFilterStructure()
    {
        $properties = new Post();

        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $properties->filterData(),
            status: 200
        );
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
        $categories = $search_text ? Category::where('name', 'like', '%' . $search_text . '%')->select(['id', 'name'])->simplePaginate(10) : Category::select(['id', 'name'])->simplePaginate(10);
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

    public function flattenArray($array, $parentKey = '')
    {
        $result = [];

        foreach ($array as $key => $value) {
            $newKey = empty($parentKey) ? $key : $parentKey . '_' . $key;

            if (is_array($value)) {
                $result = array_merge($result, $this->flattenArray($value, $newKey));
            } else {
                $result[$newKey] = $value;
            }
        }

        return $result;
    }
}
