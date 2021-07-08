<?php

namespace App\Services;

use App\Helpers\Helper;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\Repository\PersonRepository;

class PersonServices {

    protected $personRepository;

    public function __construct(PersonRepository $personRepository){
        $this->personRepository = $personRepository;
    }


    public function getPersons($dataFilter)
    {
        $dataFilter = isset($dataFilter['filter']) ? $dataFilter['filter']:[];

        return $this->personRepository->getPersons($dataFilter);
    }


    public function getPerson($personId)
    {
        return $this->personRepository->getPerson($personId);
    }


    public function create($data)
    {
        return $this->personRepository->create($data);
    }


    public function update($data, $personId)
    {

        return $this->personRepository->update($data, $personId);
    }


    public function delete($personId)
    {
        DB::beginTransaction();
        try {
            $result = $this->personRepository->delete($personId);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new InvalidArgumentException($e->getMessage());
        }

        return $result;
    }


}
?>
