<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\URL;

class APITest extends TestCase
{
    
    public function test_url_shortner_endpoint(){

        $res = $this->post('api/shortit',["destination_url" =>  "https://www.google.com/"]);

        $res->assertStatus(201);
    }

    public function test_destination_url_is_required(){

        $res = $this->post('api/shortit');

        $res->assertInvalid(["destination_url" => "required"]);

    }


    public function test_view(){

        $res = $this->post('api/shortit',["destination_url" =>  "https://www.google.com/"]);

        $short_url = $res->json();

        for($i=0;$i<5;$i++){
            
            $this->get($short_url['shortened_url']);
        }

        $url = URL::find($short_url['id']);

        $this->assertEquals($url->views,5);
        
    }
}
