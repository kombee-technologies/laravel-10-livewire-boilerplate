<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $commonRule = [
            'first_name' => 'required | regex:/^[a-zA-Z_ ]*$/ | max:191',
            'last_name' => 'required | regex:/^[a-zA-Z_ ]*$/ | max:191',
            'mobile_no' => 'required | regex:/^[6-9]\d{9}$/ | digits:10',
            'gender' => ['required', Rule::in([0, 1])],
            'email' => 'required|max:191|email',
            //'password' => 'required |nullable| min:6 | max:191',
            'gallery' => 'required|array|max:' . config('constants.max_user_gallery'),
            'gallery.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'dob' => 'required|date|date_format:Y-m-d',
            'address' => 'required|max:500',
            'country_id' => 'required|integer|exists:countries,id,deleted_at,NULL',
            'state_id' => 'required|integer|exists:states,id,deleted_at,NULL',
            'city_id' => 'required|integer|exists:cities,id,deleted_at,NULL',
            'hobby' => 'required|exists:hobbies,id,deleted_at,NULL|array',
            'hobby.*' => 'required|integer',
        ];

        return $commonRule;
    }
}
