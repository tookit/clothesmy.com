<?php


namespace App\Http\Controllers\Web;
use App\Models\Mall\Category;

class PageController
{
    public function about(){
        $categories = Category::where(['parent_id'=>null])->get();
        $images = [
            'http://optic-fiber.oss-cn-beijing.aliyuncs.com/fact/fact_01.jpg',
            'http://optic-fiber.oss-cn-beijing.aliyuncs.com/fact/fact_02.jpg',
            'http://optic-fiber.oss-cn-beijing.aliyuncs.com/fact/fact_03.jpg',
            'http://optic-fiber.oss-cn-beijing.aliyuncs.com/fact/fact_04.jpg',
            'http://optic-fiber.oss-cn-beijing.aliyuncs.com/fact/fact_05.jpg',
            'http://optic-fiber.oss-cn-beijing.aliyuncs.com/fact/fact_06.jpg',
        ];
        return view('page.about',[
            'categories' => $categories,
            'images'=>$images,
            'meta' => [
                'title' =>'',
                'keywords' =>'',
                'description' =>''
            ]

        ]);
    }
    public function contact(){
        $categories = Category::where(['parent_id'=>null])->get();
        return view('page.contact',[
            'categories' => $categories,
            'meta' => [
                'title' =>'',
                'keywords' =>'',
                'description' =>''
            ]
        ]);
    }

    public function categories() {
    }

    public function category($slug) {

    }
}
