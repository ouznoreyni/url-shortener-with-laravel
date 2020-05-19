<?php

use App\url;
use Illuminate\Support\Facades\Route;

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
    $url = Url::where('url', request()->get('url'))->first();
    if ($url) {
        return view('result')->with('urlshortened', $url->urlshortened);
    }


    $row = Url::create([
        'url' => request()->get('url'),
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