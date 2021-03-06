<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && is_admin(auth()->user());
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:products'],
            'description' => ['required', 'string', 'min:20'],
            'short_description' => ['required', 'string', 'min:5', 'max:150'],
            'SKU' => ['required', 'min:1', 'max:35', 'unique:products'],
            'price' => ['required', 'numeric', 'min:1'],
            'discount' => ['required', 'numeric', 'max:90'],
            'in_stock' => ['required', 'numeric'],
            'thumbnail' => ['required', 'image:jpeg,png'],
            'images.*' => ['image:jpeg,png'],
            'category' => ['required', 'numeric']
        ];
    }
}
