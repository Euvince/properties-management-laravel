<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:4', Rule::unique('properties')->ignore($this->route()->parameter('property'))],
            'description' => ['required', 'string', 'min:10'],
            'surface' => ['required', 'integer', 'min:10'],
            'rooms' => ['required', 'integer', 'min:0'],
            'bedrooms' => ['required', 'integer', 'min:0'],
            'floor' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'integer', 'min:2'],
            'city' => ['required', 'min:2'],
            'adress' => ['required', 'min:2'],
            'postal_code' => ['required', 'min:2'],
            'sold' => ['required', 'boolean'],
            'options' => ['array', 'exists:options,id', 'required']
        ];
    }
}
