<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class url extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'urlshortened', 'url'
    ];
    //genered random string
    private static function str_random($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function get_unique_short_url()
    {
        $short_str = self::str_random(5);
        if (Url::where('urlshortened', $short_str)->count() > 0) {
            return self::get_unique_short_url();
        }
        return $short_str;
    }
}