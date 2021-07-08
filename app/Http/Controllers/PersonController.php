<?php

namespace App\Http\Controllers;

use App\Services\PersonServices;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Persons\CreatePersonRequest;
use App\Http\Requests\Persons\DeletePersonRequest;
use App\Http\Requests\Persons\ShowAllPersonRequest;
use App\Http\Requests\Persons\ShowPersonRequest;
use App\Http\Requests\Persons\UpdatePersonRequest;
use App\Http\Resources\PersonResource;

class PersonController extends Controller
{

    protected $personServices;

    public function __construct(PersonServices $personServices)
    {
        $this->personServices = $personServices;

    }

    public function index(ShowAllPersonRequest $request)
    {
        try
        {
            $dataFilter = $request->only('filter');
            $result     = $this->personServices->getPersons($dataFilter);
        }
        catch(\Exception $error){
            return response()->json(['error' => $error->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return PersonResource::collection($result);
    }


    public function show(ShowPersonRequest $request, $personId)
    {
        try
        {
            $result     = $this->personServices->getPerson($personId);
        }
        catch(\Exception $error){
            return response()->json(['error' => $error->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new PersonResource($result);
    }


    public function store(CreatePersonRequest $request)
    {
        try
        {
            $data = $request->only('civility' ,'first_name' ,'last_name' ,'date_of_birth' ,'address' ,'cin' ,'function' ,'phone_number' ,'email' ,'city_id' ,'region_id');
            $result     = $this->personServices->create($data);
        }
        catch(\Exception $error){
            return response()->json(['error' => $error->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new PersonResource($result);
    }


    public function update(UpdatePersonRequest $request, $personId)
    {
        try
        {
            $data = $request->only('civility' ,'first_name' ,'last_name' ,'date_of_birth' ,'address' ,'cin' ,'function' ,'phone_number' ,'email' ,'city_id' ,'region_id');
            $result     = $this->personServices->update($data, $personId);
        }
        catch(\Exception $error){
            return response()->json(['error' => $error->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new PersonResource($result);
    }


    public function destroy(DeletePersonRequest $request, $personId)
    {
        try
        {
            $result     = $this->personServices->delete($personId);
        }
        catch(\Exception $error){
            return response()->json(['error' => $error->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new PersonResource($result);
    }


}
