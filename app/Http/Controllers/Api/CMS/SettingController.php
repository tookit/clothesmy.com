<?php

namespace App\Http\Controllers\Api\CMS;

use App\Http\Controllers\Controller;
use App\Http\Resources\Resource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Valuestore\Valuestore;

class SettingController extends Controller
{
    const SETTING_FILE = 'setting.json';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $valuestore = Valuestore::make(storage_path((self::SETTING_FILE)));
        // $valuestore->put('key', 'value');
        return new JsonResource([
            'data' => $valuestore->all()
        ]);

    }



    /**
     * create a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valuestore = Valuestore::make(storage_path((self::SETTING_FILE)));
        foreach($request->all() as $key => $value) {
            $valuestore->put($key, $value);
        }
        return (new JsonResource([
            'data' => $valuestore->all()
                ]))
            ->additional(['meta' => [
                'message' => 'Setting updated',
            ]]);
    }



}
