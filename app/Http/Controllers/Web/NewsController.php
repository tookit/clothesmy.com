<?php


namespace App\Http\Controllers\Web;
use App\Models\CMS\Post;
use App\Models\Mall\Category;
use App\Models\CMS\Category as NewsCategory;
class NewsController
{
    public function index(){
        $categories = Category::where(['parent_id'=>null])->get();
        $newsCategories = NewsCategory::all();
        $news = Post::with(['category']);
        return view('news.index', [
            'categories' => $categories,
            'newsCategories'=> $newsCategories,
            'news' => $news

        ]);
    }
    public function view($slug){
        $item = Post::with(['category'])->where(['slug'=>$slug])->first();
        $categories = Category::where(['parent_id'=>null])->get();
            return view('news.item',[
            'categories'=> $categories,
            'item' => $item
        ]);
    }

    public function category($slug) {
        $categories = Category::with(['children'])->where(['parent_id'=>null])->get();
        $item = Category::with(['products','children'])->where(['slug'=>$slug])->first();
        return view('product.category',[
            'item' => $item,
            'categories'=>$categories
        ]);
    }
}
