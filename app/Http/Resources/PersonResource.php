<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'civility'      => $this->civility,
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'full_name'     => $this->full_name,
            'date_of_birth' => $this->date_of_birth,
            'address'       => $this->address,
            'cin'           => $this->cin,
            'function'      => $this->function,
            'phone_number'  => $this->phone_number,
            'email'         => $this->email,
            'city'          => new CityResource($this->city),
            'region'        => new RegionResource($this->region),
                ];
    }
}
