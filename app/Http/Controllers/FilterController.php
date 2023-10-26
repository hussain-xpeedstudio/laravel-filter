<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SyntheticFilters\Traits\ResponseTrait;
// use SyntheticFilters\Traits\FilterTrait;
use App\Models\Document;
use App\Models\Category;
use App\Models\Post;
use Faker\Factory as Faker;

class FilterController extends Controller
{
    use ResponseTrait;
    public function getPostData()
    {
        $posts = Post::sort()->filter()->with('category:name,status,user_id')
            ->get();
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $posts,
            status: 200
        );
    }
    public function getModelFilterStructure(){
        $properties=new Post();
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $properties->filterData(),
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
