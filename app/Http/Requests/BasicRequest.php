<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BasicRequest extends FormRequest
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


    public function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(response()->json([
            'code' => 0,
            'msg' => $validator->errors()->first(),
        ], 200)));
    }

}
