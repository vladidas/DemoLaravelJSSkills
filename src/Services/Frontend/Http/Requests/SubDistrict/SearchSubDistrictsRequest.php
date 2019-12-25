<?php

namespace App\Services\Frontend\Http\Requests\SubDistrict;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Class SearchSubDistrictsRequest
 * @package App\Services\Frontend\Http\Requests\SubDistrict
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class SearchSubDistrictsRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    /**
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            response()->json($validator->errors(), 422)
        );
    }
}
