<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'      => 'min:3',
            'mobile'    => 'max:10',
            'telephone' => 'max:10',
            'city'      => 'min:3',
            'profile'   => 'nullable|mimes:png,jpg',
            'gender'    => 'nullable',
            'address'   => 'nullable',
            'job'       => 'nullable',
        ];
    }

    public function BankData($data)
    {
        return [
            'description' => $this->description,
            'owner'       => $this->owner,
            'branch'      => $this->branch,
            'account'     => $this->account,
            'name'        => $this->bank_name,
            'client_id'   => $data->id,
        ];
    }
}
