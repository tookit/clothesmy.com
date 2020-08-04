<?php


namespace App\Http\Controllers\Web;
use App\Models\Mall\Product;
use App\Models\Mall\Category;
class ProductController
{
    public function index(){
        $categories = Category::withCount('products')->where(['parent_id'=>null])->get();
        return view('product.index', [
            'categories' => $categories,
            'meta' => [
                'title' =>'',
                'keywords' =>'',
                'description' =>''
            ]

        ]);
    }
    public function view($slug){
        $item = Product::with(['categories'=>function($query){
            return $query->withDepth()->orderBy('depth');
       },'tags'])->where(['slug'=>$slug])->first();
        $categories = Category::where(['parent_id'=>null])->get();
            return view('product.item',[
            'categories'=> $categories,
            'item' => $item,
            'meta' => [
                'title' =>$item->meta_title ?? '',
                'keywords' =>$item->meta_keywords ?? '',
                'description' =>$item->meta_description ?? ''
            ]
        ]);
    }

    public function categories() {
        return view('product.categories');
    }

    public function category($slug) {
        $categories = Category::with(['children'])->where(['parent_id'=>null])->get();
        $item = Category::with(['products','children'])->where(['slug'=>$slug])->first();
        return view('product.category',[
            'item' => $item,
            'categories'=>$categories,
            'meta' => [
                'title' =>'',
                'keywords' =>'',
                'description' =>''
            ]
        ]);
    }
}
