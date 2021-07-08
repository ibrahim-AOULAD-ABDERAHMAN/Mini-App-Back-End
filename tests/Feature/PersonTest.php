<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonTest extends TestCase
{

    public function _testGetAllPersons()
    {
        $response = $this->get('api/persons');

        $response->dump();
        $response->assertStatus(Response::HTTP_OK);
    }

    public function _testShowPerson()
    {
        $id = 6;
        $response = $this->get('api/person/'.$id);

        $response->dump();
        $response->assertStatus(Response::HTTP_OK);
    }


    public function _testCreatePerson()
    {
        $data                   = [];

        $data["civility"]      = "M";
        $data["first_name"]    = "ib";
        $data["last_name"]     = "ra";
        $data["date_of_birth"] = "1995-02-05";
        $data["address"]       = "tet teet ";
        $data["cin"]           = "fhh";
        $data["function"]      = "";
        $data["phone_number"]  = "";
        $data["email"]         = "dgd@gmail.com";
        $data["city_id"]       = "1";
        $data["region_id"]     = "1";

        $response = $this->post('api/persons', $data);

        $response->dump();
        $response->assertStatus(Response::HTTP_OK);
    }

    public function _testUpdatePerson()
    {
        $id                    = 12;
        $data                  = [];

        $data["civility"]      = "M";
        $data["first_name"]    = "ib";
        $data["last_name"]     = "ra";
        $data["date_of_birth"] = "1995-08-05";
        $data["address"]       = "tet teet ";
        $data["cin"]           = "fhh";
        $data["function"]      = "";
        $data["phone_number"]  = "";
        $data["email"]         = "dgd@gmail.com";
        $data["city_id"]       = "1";
        $data["region_id"]     = "1";

        $response = $this->put('api/persons/'.$id, $data);

        $response->dump();
        $response->assertStatus(Response::HTTP_OK);
    }


    public function _testDeletePerson()
    {
        $id = 11;
        $response = $this->delete('api/persons/'.$id);
        $response->dump();
        $response->assertStatus(Response::HTTP_OK);
    }


}
