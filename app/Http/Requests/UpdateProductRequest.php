<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'code' => ['required', Rule::unique('products', 'code')->ignore($this->product->id)],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'gt:0'],
            'category' => ['sometimes', 'array'],
            'photo' => ['sometimes','file', 'mimes:jpg,jpeg,bmp,png']
        ];
    }
}
