<?php


namespace App\Http\Controllers\Web;

use App\Models\Mall\Category;
use Illuminate\Http\Request;
use App\Models\Mall\Product as Model;

class SearchController
{
    public function index(Request $request){

        $categories = Category::where(['parent_id'=>null])->get();
        return view('search.index',[
            'categories' => $categories,
            'items' => Model::search($request->get('q'))->paginate(100),
            'query' => $request->get('q')
        ]);
    }
}
