<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\url;

use Illuminate\Support\Facades\Validator;

class UrlsController extends Controller
{
    public function create()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        //validation
        //1
        ///
        //message error
        //, [
        //     'url.required' => "Vous devez fournir une URL.",
        //     'url.url' => "Url est invalide."

        // ]
        //)->validate();
        // if ($validation->fails()) {
        //     dd('failed');
        // }

        //2
        $this->validate($request, [
            'url' => ['required', 'url']
        ]);
        $record = $this->getRecordUrl(request()->get('url'));
        return view('result')->with('urlshortened', $record->urlshortened);
    }

    public function show($shortened)
    {
        $url = Url::where('urlshortened', $shortened)->first();
        if (!$url) {
            return redirect('/');
        }
        return redirect($url->url);
    }


    //method helper

    private function getRecordUrl($url)
    {
        //verify if url is already created it retourn it
        $record = Url::where('url', $url)->first();
        if ($record) {
            return $record;
        }
        return  Url::create([
            'url' => $url,
            'urlshortened' => Url::get_unique_short_url()
        ]);
    }
}