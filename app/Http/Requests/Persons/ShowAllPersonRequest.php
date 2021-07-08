<?php

namespace App\Http\Requests\Persons;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class ShowAllPersonRequest extends BaseRequest
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
            //
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
