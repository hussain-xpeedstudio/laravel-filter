<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SyntheticFilters\Traits\ResponseTrait;
use App\Models\Category;
use App\Models\Post;
use Faker\Factory as Faker;
class FilterController extends Controller
{
    use ResponseTrait;
    public function getPostTableData()
    {
        Post::boot();
        $posts = Post::sort()->filter()->with('category:name')
            ->simplePaginate(10);
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $posts->toArray(),
            status: 200
        );
    }
    public function getPostTableStructure()
    {
        $table_structure =Config('table-structure');
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $table_structure,
            status: 200
        );
    }
    public function testFunction()
    {
        Post::boot();
        $posts = Post::sort()->filter()->with('category:name')
                    ->simplePaginate(10);
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $posts->toArray(),
            status: 200
        );
    }
    public function getPostFilterStructure(){
        $properties=new Post();
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $properties->filterData(),
            status: 200
        );
    }
    public function getCategoryStructure(){
        $properties=new Category();
        $this->log('success', 'Data Fetched successfully');
        return $this->response(
            data: $properties->filterData(),
            status: 200
        );
    }
    public function getCategoryRelationData(){
        $search_text=request('search_text');
        $categories=$search_text?
                    Category::where('name', 'like', '%' . $search_text . '%')
                    ->select(['id', 'name', 'status'])
                    ->simplePaginate(10) 
                    : 
                    Category::select(['id', 'name','status'])
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
