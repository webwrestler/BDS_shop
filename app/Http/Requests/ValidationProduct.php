<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationProduct extends FormRequest
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
            'name' => 'required|max:31',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Поле "Name" обязантельно для заполнения',
            'price.required' => 'Поле "Price" обязантельно для заполнения',
            'price.integer' => 'Поле "Price" должно быть числом',
            'quantity.required' => 'Поле "Quantity" обязантельно для заполнения',
            'quantity.integer' => 'Поле "Quantity" должно быть числом',
            'name.max'  => 'Поле "Title" может быть не больше 31 символа',
        ];
    }
}
