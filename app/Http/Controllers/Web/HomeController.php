<?php


namespace App\Http\Controllers\Web;

use App\Models\CMS\Slider;
use App\Models\Mall\Category;
use App\Models\Mall\Product;
class HomeController
{
    public function index(){

        $categories = Category::where(['parent_id'=>null])->get();
        $fiber = Category::with(['children','children.products'])->find(1);
        $slider = Slider::visible();
        $promotes = Category::featured()->get();
        return view('home.index',[
            'categories' => $categories,
            'fiber' => $fiber,
            'sliders'=>$slider,
            'promotes' => $promotes,
            'meta' => [
                'title' =>'',
                'keywords' =>'',
                'description' =>''
            ]
        ]);
    }
}
