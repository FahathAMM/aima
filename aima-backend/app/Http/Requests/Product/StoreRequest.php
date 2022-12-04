<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'      => 'required|min:3',
            'mobile'    => 'required|max:10',
            'telephone' => 'required|max:10',
            'city'      => 'required|min:3',
            'profile'   => 'nullable|mimes:png,jpg',
            'gender'    => 'required',
            'address'   => 'nullable',
            'job'       => 'nullable',
        ];
    }
}
