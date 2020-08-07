<?php

namespace App\Http\Controllers\Api\Mall;

use App\Http\Controllers\Controller;
use App\Http\Resources\MediaResource;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

use App\Models\Mall\Product as Model;
use App\Http\Resources\Mall\ProductResource as Resource;
use App\Http\Requests\Mall\ProductRequest as ValidateRequest;
use App\Http\Requests\MediaAttachRequest;
use App\Http\Requests\Meta\MetaRequest;
use App\Models\Mall\Property;
use App\Models\Media\Media;
use Spatie\QueryBuilder\AllowedFilter;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $builder = QueryBuilder::for(Model::class)
            ->with(['media','props','props.property','categories'=>function($query){
                return $query->withDepth()->orderBy('depth');
            }])
            ->allowedFilters([
                AllowedFilter::exact('is_active'),
                AllowedFilter::exact('name'),
                AllowedFilter::exact('categories.id'),
                AllowedFilter::scope('imaged', 'hasImage'),
                ])
            ->allowedSorts(Model::$allowedSorts);
        return Resource::collection(

            $request->get('pageSize') !== '-1'
                ?
                $builder->paginate($request->get('pageSize'),['*'],'page')
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
        return
        (new Resource(Model::create($request->validated())))
            ->additional(['meta' => [
                'message' => 'Product created',
        ]]);;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Model::with(['categories'=>function($query){
             return $query->withDepth()->orderBy('depth');
        },'media', 'meta','tags', 'props','props.property'])->findOrFail($id);
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
        if($request->get('categories')) {
            $item->categories()->sync($request->get('categories'));
        }
        if($request->get('tags')) {
            $item->syncTagsWithType($request->get('tags'),'fiber');
        }
        return (new Resource($item))
                ->additional(['meta' => [
                    'message' => 'Product updated',
                ]]);
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
                'message' => 'Product deleted',
            ]]);
        ;
    }

    public function attachProps($id,Request $request){
        $item = Model::findOrFail($id);
        foreach($request->all() as $slug => $values) {
            $prop = Property::where(['slug'=>$slug])->first();
            if($prop) {
                $item->props()->syncWithoutDetaching($values);
            }
        }
        return (new Resource($item))
            ->additional(['meta' => [
                'message' => 'Props attached',
            ]]);
        ;
    }


    public function attachMedia($id,MediaAttachRequest $request){
        $item = Model::findOrFail($id);
        $media = Media::find($request->get('media_id'));
        if(!$item->includeMedia($media)) {
            $item->attachMedia($media,'fiber');

        }
        return (new Resource($item))
            ->additional(['meta' => [
                'message' => 'Media attached',
            ]]);
        ;
    }


    public function search(Request $request) {
        $collection = Model::with(['categories'])->search($request->get('q'))->paginate();
        return new Resource($collection);
    }

    public function listImage($id)
    {
        $item = Model::with(['categories','media'])->findOrFail($id);
        return  MediaResource::collection($item->getMedia('fiber'));
    }


    public function attachMeta($id,MetaRequest $request){
        $item = Model::findOrFail($id);
        $item->syncMeta($request->validated());
        return new Resource($item);
    }

}
