<?php


namespace App\Http\Controllers\Web;
use App\Models\Mall\Product;
use App\Models\Mall\Category;
use App\Models\Mall\Property;
class ProductController
{
    public function index(){
        $categories = Category::withCount('products')->where(['parent_id'=>null])->get();
        return view('product.index', [
            'categories' => $categories,
        ]);
    }
    public function view($slug){
        $item = Product::findBySlug($slug)->load(
            [
                'categories'=> function( $query )  {
                    return $query->withDepth()->orderBy('depth');
                },
            'media', 'meta','tags', 'props','props.property']
        );

        $categories = Category::where(['parent_id'=>null])->get();
            return view('product.item',[
            'categories'=> $categories,
            'item' => $item
        ]);
    }

    public function categories() {
        return view('product.categories');
    }

    public function category($slug) {
        $categories = Category::with(['children'])->where(['parent_id'=>null])->get();
        $item = Category::with(['products','children'])->withCount(['products'])->where(['slug'=>$slug])->first();
        $filters = Property::with(['values'])->get();
        return view('product.category',[
            'item' => $item,
            'categories'=>$categories,
            'filters' => $filters
        ]);
    }
}
