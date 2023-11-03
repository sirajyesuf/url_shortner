<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\URL;

class URLGenerator
{

    public static function  generate(){

        do {

            $randomString = Str::random(5);

        } while (URL::where('slug', $randomString)->exists());

        return $randomString;
    }
}