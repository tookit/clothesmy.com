<?php

namespace App\Http\Controllers\Api\I18n;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;


class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tr = new GoogleTranslate('fr');
        $source = $request->get('text');
        $text = $tr->translate($source);
        dd($text);
    }



}
