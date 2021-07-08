<?php

namespace App\Http\Requests\Persons;

use App\Http\Requests\BaseRequest;

class CreatePersonRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'civility'      => ['bail', 'required', 'in:M,F'],
            'first_name'    => ['bail','required', 'string', 'max:50'],
            'last_name'     => ['bail', 'required', 'string', 'max:50'],
            'date_of_birth' => ['bail','required', 'date'],
            'address'       => ['bail', 'required', 'string', 'max:250'],
            'cin'           => ['bail', 'required', 'string', 'max:10'],
            'function'      => 'nullable|string|max:50',
            'phone_number'  => 'nullable|string|max:10',
            'email'         => 'nullable|email:rfc,dns',
            'city_id'       => ['bail', 'required', 'exists:cities,id'],
            'region_id'     => ['bail', 'required', 'exists:regions,id'],
        ];
    }


    /**
     * Get the validation filters that apply to the request.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //
        ];
    }
}
