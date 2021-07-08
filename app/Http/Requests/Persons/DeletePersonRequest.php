<?php

namespace App\Http\Requests\Persons;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class DeletePersonRequest extends BaseRequest
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

    protected function prepareForValidation()
    {
        $this->merge(['id' => $this->route('personId')]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'            => 'exists:persons',
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
