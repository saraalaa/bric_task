<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
        $unique = $this->getMethod() == 'POST' ? 'unique:customers,email' : Rule::unique('customers')->ignore(request('customer')->id);

        return [
            'name' => ['required'],
            'email' => ['required', 'email', $unique],
        ];
    }
}
