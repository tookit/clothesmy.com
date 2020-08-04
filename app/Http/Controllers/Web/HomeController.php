<?php


namespace App\Http\Controllers\Web;

use App\Models\CMS\Slider;
use App\Models\Mall\Category;
use App\Models\Mall\Product;
class HomeController
{
    public function index(){

        $categories = Category::where(['parent_id'=>null])->get();
        $fiber = Category::with(['children','children.products'])->find(2110);
        $slider = Slider::visible();
        return view('home.index',[
            'categories' => $categories,
            'fiber' => $fiber,
            'sliders'=>$slider,
            'meta' => [
                'title' =>'',
                'keywords' =>'',
                'description' =>''
            ]
        ]);
    }
}
