<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'product_name' => 'required|unique:products',
            'product_code' => 'nullable',
            'product_qty' => 'required|numeric',
            'product_tags' => 'nullable',
            'product_size' => 'nullable',
            'product_color' => 'nullable',
            'purchase_price' => 'numeric|nullable',
            'selling_price' => 'required|numeric',
            'discount_price' => 'numeric|nullable',
            'short_description' => 'nullable',
            'long_description' => 'nullable',
            'product_thumbnail' => 'required|mimes:png,jpg',
            'product_images' => 'nullable',
            'hot_deals' => 'nullable',
            'featured' => 'nullable',
            'new_arrival' => 'nullable',
            'special_offer' => 'nullable',
            'special_deals' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
