<?php

namespace App\Http\Controllers\Api\Mall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Mall\PropertyValue as Model;
use App\Http\Resources\Mall\PropertyValueResource as Resource;
use App\Http\Requests\Mall\PropertyValueRequest as ValidateRequest;

class PropertyValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *c
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $builder = QueryBuilder::for(Model::class)
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
        $item = Model::with(['values'])->findOrFail($id);
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

}
