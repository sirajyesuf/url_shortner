<?php

namespace App\Http\Controllers;

use App\Models\URL;
use App\Services\URLGenerator;
use Illuminate\Support\Str;
use App\Http\Requests\StoreURLRequest;

class URLController extends Controller
{
  

    public function index(){

        return view("urls.index",['urls' => URL::all()]);
    }

    public function store(StoreURLRequest $request)
    {
        $destination_url =  $request->input('destination_url');

        $shortUrl = $this->generate($destination_url);

        // Save the short URL to the database
        URL::create([
            'destination' => $destination_url,
            'slug' => $shortUrl,
        ]);

        return redirect(route("urlshortner.index"));
    }

    public function redirect(URl $url)
    {
        
        // Redirect to the destinationURL
        return redirect($url->destination);
    }

    public  function  generate($destination_url){

        do {

            $randomString = Str::random(5);


        } while (URL::where('slug', $randomString)->exists());

        return $randomString;
    }
}
