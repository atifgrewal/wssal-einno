<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'products.*' => [
                'integer',
            ],
            'products' => [
                'required',
                'array',
            ],
            'driver_id' => [
                'required',
                'integer',
            ],
            'customer_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'numeric',
                'required',
            ],
            'payment' => [
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
