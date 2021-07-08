<?php

namespace App\Repository;

use App\Helpers\Helper;
use App\Models\Person;

class PersonRepository {

    protected $person;

    public function __construct(Person $person){
        $this->person = $person;
    }


    public function getPersons($dataFilter)
    {
        $search     = $dataFilter['search'] ?? null;
        $pagination = $dataFilter['pagination'] ?? Helper::PAGINATION;
        $data       = $this->person->search($search)->with('city', 'region')->paginate($pagination);

        return $data;
    }


    public function getPerson($personId)
    {
        $person   = $this->person->where('id', $personId)->with('city', 'region')->firstOrFail();
        return $person;
    }


    public function create($data)
    {
        $person                = new $this->person;
        $person->civility      = $data['civility'];
        $person->first_name    = $data['first_name'];
        $person->last_name     = $data['last_name'];
        $person->date_of_birth = $data['date_of_birth'];
        $person->address       = $data['address'];
        $person->cin           = $data['cin'];
        $person->function      = $data['function'] ?? null;
        $person->phone_number  = $data['phone_number'] ?? null;
        $person->email         = $data['email'] ?? null;
        $person->city_id       = $data['city_id'];
        $person->region_id     = $data['region_id'];
        $person->save();

        return $person->fresh();
    }


    public function update($data, $personId)
    {
        $person                = $this->person->where('id', $personId)->firstOrFail();
        $person->civility      = $data['civility'];
        $person->first_name    = $data['first_name'];
        $person->last_name     = $data['last_name'];
        $person->date_of_birth = $data['date_of_birth'];
        $person->address       = $data['address'];
        $person->cin           = $data['cin'];
        $person->function      = $data['function'] ?? null;
        $person->phone_number  = $data['phone_number'] ?? null;
        $person->email         = $data['email'] ?? null;
        $person->city_id       = $data['city_id'];
        $person->region_id     = $data['region_id'];
        $person->update();

        return $person->fresh();

    }


    public function delete($personId)
    {
        $person    = $this->person->where('id', $personId)->firstOrFail();
        $person->delete();

        return $person;
    }


}
?>
