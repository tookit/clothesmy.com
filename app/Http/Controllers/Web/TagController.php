<?php


namespace App\Http\Controllers\Web;
use App\Models\Taggable\Tag;
use App\Models\Mall\Category;
class TagController
{
    public function index(){

    }
    public function view($slug){
        $item = Tag::with(['products'])->where(['slug'=>$slug])->first();
        $categories = Category::where(['parent_id'=>null])->get();
            return view('tag.item',[
            'categories'=> $categories,
            'item' => $item,
            'meta' => [
                'title' =>$item->name,
                'keywords' =>$item->name,
                'description' =>$item->description
            ]
        ]);
    }


}
