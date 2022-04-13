<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            // 'tags.*' => [
            //     'integer',
            // ],
            'tags' => [
                'array',
            ],
            // 'attributes.*' => [
            //     'integer',
            // ],
            'attributes' => [
                'array',
            ],
            // 'attribute_values.*' => [
            //     'integer',
            // ],
            'attribute_values' => [
                'required',
                'array',
            ],
            // 'variation_id' => [
            //     'required',
            //     'integer',
            // ],
            'unit_id' => [
                'required',
                'integer',
            ],
            'regular_price' => [
                'numeric',
            ],
            'sale_price' => [
                'numeric',
                'required',
            ],
            'sku' => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'qty' => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'vendor' => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'image' => [
                'array',
            ],
        ];
    }
}
