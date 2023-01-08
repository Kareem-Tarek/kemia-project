<?php

namespace App\Http\Requests\User;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|max:50|min:2',
            'mobile'        => 'required|numeric|digits:11|unique:users,mobile,except,'. $this->id,
            'email'         => 'required|email|unique:users,email,except,'. $this->id,
            'password'      => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'roles_name'    => 'required|string|exists:roles,name',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            'view'          => 'nullable|string|in:yes,no',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             =>  __('validation.required'),
            'name.string'               => __('validation.string'),
            'name.max'                  => __('validation.max'),
            'name.min'                  => __('validation.min'),

            'mobile.required'           => __('validation.required'),
            'mobile.numeric'            => __('validation.numeric'),
            'mobile.digits'             =>  __('validation.digits'),
            'mobile.unique'             =>  __('validation.unique'),

            'email.required'            => __('validation.required'),
            'email.email'               => __('validation.email'),
            'email.unique'              => __('validation.unique'),

            'password.required'         =>  __('validation.required'),
            'password.string'           => __('validation.required'),
            'password.min'              => __('validation.min'),
            'password.regex'            => __('validation.regex'),

            'roles_name.required'       =>  __('validation.required'),
            'roles_name.string'         => __('validation.string'),
            'roles_name.exists'         => __('validation.exists'),

            'photo.image'               => __('validation.image'),
            'photo.mimes'               => __('validation.mimes'),
            'photo.max'                 => __('validation.max'),
        ];
    }


    public function attributes()
    {
        return [
            'name'          => __('master.name'),
            'mobile'        => __('master.mobile'),
            'email'         => __('master.email'),
            'password'      => __('master.password'),
            'roles_name'    => __('role.name'),
            'photo'         => __('master.image'),
        ];
    }
}
