<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'discount_amount' => 'numeric|nullable',
            'stock' => 'required|numeric',
            'category_id' => 'required',
            'description' => 'nullable',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
