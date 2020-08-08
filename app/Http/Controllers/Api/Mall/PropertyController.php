<?php

namespace App\Http\Controllers\Api\Mall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\MediaResource;
use App\Models\Mall\Property as Model;
use App\Models\Mall\PropertyValue;
use App\Http\Resources\Mall\PropertyResource as Resource;
use App\Http\Requests\Mall\PropertyRequest as ValidateRequest;
use App\Http\Requests\Mall\ImageRequest as ImageRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *c
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $builder = QueryBuilder::for(Model::class)
            ->withCount(['values'])
            ->with(['values'])
            ->allowedFilters(Model::$allowedFilters)
            ->allowedSorts(Model::$allowedSorts);
        return Resource::collection(

            $request->get('pageSize') !== '-1'
                ?
                $builder->paginate($request->get('pageSize'),['*'],'page')
                :
                $builder->get()

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
                    'message' => 'Property created.',
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
        $item = Model::with(['values'])->findOrFail($id);
        return new Resource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listValues($id)
    {
        $item = Model::with(['values'])->findOrFail($id);
        return new Resource($item->values);
    }


    public function attachValue($id, Request $request)
    {
        $item = Model::findOrFail($id);
        $value = PropertyValue::updateOrCreate(['value'=>$request->get('value')]);
        $item->values()->save($value);
        return (new Resource($item))
            ->additional(['meta' => [
                'message' => 'Property value updated',
            ]]);
        ;
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
                'message' => 'Property updated',
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
                'message' => 'Property deleted.',
            ]]);
        ;
    }

}
