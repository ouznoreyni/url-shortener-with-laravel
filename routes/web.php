<?php

use App\url;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', function () {
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
});

Route::get('/{shortened}', function ($shortened) {
    $url = Url::where('urlshortened', $shortened)->first();
    if (!$url) {
        return redirect('/');
    }
    return redirect($url->url);
});