<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreURLRequest;
use App\Services\URLGenerator;
use App\Models\URL;
use App\Http\Resources\URLResource;
class URLController extends Controller
{
    public function store(StoreURLRequest $request)
    {
        $destination_url =  $request->input('destination_url');

        $shortUrl = URLGenerator::generate($destination_url);

        // Save the short URL to the database
        $url = URL::create([
            'destination' => $destination_url,
            'slug' => $shortUrl,
        ]);


        return  new URLResource($url);

    }
}
