<?php

namespace App\Http\Requests;

use App\Exceptions\RequestException;
use App\Rules\AlphaNumericRule;
use App\Rules\UpperLowerCaseRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            // 'role_id' => 'required',
            // 'city_id' => 'required',
            // 'grade_id' => 'required',
            // 'school_id' => 'required_without:school_name',
            // 'school_name' => 'required_without:school_id',
            // 'parent_name' => 'required',
            // 'name' => 'required',
            // 'email' => 'required|email:rfc,dns|unique:users',
            // 'password' => ['required', 'min:8', new UpperLowerCaseRule, new AlphaNumericRule ],
            // 'phone' => 'required|unique:users',
            // 'dob' => 'required|date',
            // 'image' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new RequestException($validator->errors());
    }
}
