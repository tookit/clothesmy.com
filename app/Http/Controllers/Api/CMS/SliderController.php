<?php

namespace App\Http\Controllers\Api\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

use App\Models\CMS\Slider as Model;
use App\Http\Resources\MediaResource;
use App\Http\Resources\CMS\SliderResource as Resource;
use App\Http\Requests\CMS\SliderRequest as ValidateRequest;
use App\Http\Requests\Mall\ImageRequest as ImageRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $builder = QueryBuilder::for(Model::class)
            ->with(['media'])
            ->allowedFilters(Model::$allowedFilters)
            ->allowedSorts(Model::$allowedSorts);
        return Resource::collection(

            $request->get('pageSize') !== '-1'
                ?
                $builder->paginate($request->get('pageSize'),['*'],'current')
                :
                $builder->get()

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
        $request->setScenario('CREATE');
        return (new Resource(Model::create($request->validated())))
            ->additional(['meta' => [
                'message' => 'Slider created',
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
        return new Resource(Model::findOrFail($id));
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
                'message' => 'Slider updated',
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
        return (new Resource([]))
            ->additional(['meta' => [
                'message' => 'Slider deleted',
            ]]);
        ;
    }

    public function attachImage($id,ImageRequest $request){
        $image = $request->validated()['file'];
        $item = Model::findOrFail($id);
        $item->addMedia($image)->toMediaCollection('slider','oss');
        return new Resource($item);
    }



    public function listImage($id)
    {
        $item = Model::with([''])->findOrFail($id);
        return  MediaResource::collection($item->getMedia('slider'));
    }
}
