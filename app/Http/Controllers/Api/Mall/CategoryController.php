<?php

namespace App\Http\Controllers\Api\Mall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\MediaResource;
use App\Models\Mall\Category as Model;
use App\Http\Resources\Mall\CategoryResource as Resource;
use App\Http\Requests\Mall\CategoryRequest as ValidateRequest;
use App\Http\Requests\Mall\ImageRequest as ImageRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *c
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $builder = QueryBuilder::for(Model::class)
            ->whereNull('parent_id')
            ->withCount(['products'])
            ->with(['children','media'])
            ->allowedFilters(Model::$allowedFilters)
            ->allowedSorts(Model::$allowedSorts);
        return Resource::collection(

            $request->get('pageSize') !== '-1'
                ?
                $builder->paginate($request->get('pageSize'),['*'],'page')
                :
                $builder->get()->toTree()

        );
    }


    public function tree()
    {
        $collection = Model::withCount('products')->get();
        return Resource::collection($collection->toTree());
    }
    /**
     * create a new category.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateRequest $request)
    {
        return (new Resource(Model::create($request->validated())))
                ->additional(['meta' => [
                    'message' => 'Product category created.',
                ]]);
        ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Model::with(['ancestors','media'])->findOrFail($id);
        return new Resource($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateRequest $request, $id)
    {
        $item = Model::updateOrCreate(['id'=>$id],$request->validated());
        return (new Resource($item))
            ->additional(['meta' => [
                'message' => 'Product category updated',
            ]]);
        ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Model::findOrFail($id);
        $item->delete();
        return (new Resource($item))
            ->additional(['meta' => [
                'message' => 'Product category deleted.',
            ]]);
        ;
    }

    public function listImage($id)
    {
        $item = Model::with(['media'])->findOrFail($id);
        return  MediaResource::collection($item->getMedia('images'));
    }


    public function attachImage($id,ImageRequest $request){
        $image = $request->validated()['file'];
        $item = Model::findOrFail($id);
        $item->addMedia($image)->toMediaCollection('images','oss');
        return new Resource($item);
    }
}
