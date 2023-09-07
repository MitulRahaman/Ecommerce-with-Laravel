<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'code' => ['required', 'unique:products,code'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'gt:0'],
            'category' => ['required', 'array'],
            'photo' => ['required', 'file', 'mimes:jpg,jpeg,bmp,png']
        ];
    }
}
