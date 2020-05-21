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

    public function store()
    {
        $url = request()->get('url');

        //validation
        Validator::make(
            compact('url'),
            [
                'url' => ['required', 'url']
            ]
            //message error
            //, [
            //     'url.required' => "Vous devez fournir une URL.",
            //     'url.url' => "Url est invalide."

            // ]
        )->validate();
        // if ($validation->fails()) {
        //     dd('failed');
        // }

        //verify if url is already created it retourn it
        $record = Url::where('url', $url)->first();
        if ($record) {
            return view('result')->with('urlshortened', $record->urlshortened);
        }


        $row = Url::create([
            'url' => $url,
            'urlshortened' => Url::get_unique_short_url()
        ]);
        if ($row) {
            return view('result')->with('urlshortened', $row->urlshortened);
        } else {
            return view('errorshortened');
        }
    }

    public function show($shortened)
    {
        $url = Url::where('urlshortened', $shortened)->first();
        if (!$url) {
            return redirect('/');
        }
        return redirect($url->url);
    }
}