<?php

namespace App\Http\Controllers\Api\Media;

use App\Http\Requests\MediaPropRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\Controller;
use App\Http\Resources\MediaResource as Resource;
use Michaelwang\Mediable\MediaUploaderFacade as MediaUploader;
use App\Models\Media\Media as Model;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
class MediaController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request) : AnonymousResourceCollection
    {

        $builder = QueryBuilder::for(Model::order())
        ->with(['product','slider'])
        ->withCount(['product','slider'])
        ->allowedFilters([
            AllowedFilter::exact('filename'),
            AllowedFilter::exact('directory')
            ]);
        return Resource::collection(
            $builder->paginate($request->get('pageSize'),['*'],'page')
        );
    }

    public function listFile() {
        $direcotries = DB::table('medias')
        ->select(DB::raw('directory'))
        ->groupBy('directory')
        ->get();
        return Resource::collection(
            $direcotries
        );
    }



    public function store(Request $request)
    {
        $dir = $request->get('dir') ?? 'upload';
        $media = MediaUploader::fromSource($request->file('file'))
        ->toDestination('oss',$dir)
        ->useHashForFilename()
        ->upload();
        return
        (new Resource($media))
            ->additional(['meta' => [
                'message' => 'Media uploaded',
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
        $item = Model::findOrFail($id);
        return new Resource($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MediaPropRequest $request, $id)
    {
        $item = Model::updateOrCreate(['id'=>$id],$request->validated());
        return (new Resource($item))
                ->additional(['meta' => [
                    'message' => 'Media updated',
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
                    'message' => 'Media deleted',
                ]]);
    }
}
