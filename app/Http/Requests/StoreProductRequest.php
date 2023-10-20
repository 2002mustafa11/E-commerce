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
        'name' => 'required|min:3',
        'image' => 'required|image|max:2848',
        'category' => 'required|numeric',
        'regular_price' => 'required|numeric',
        'discount_price' => 'numeric',
        'quantity' => 'required|numeric',
        ];
    }
}
