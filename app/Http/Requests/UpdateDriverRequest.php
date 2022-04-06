<?php

namespace App\Http\Requests;

use App\Models\Driver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDriverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('driver_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:drivers,email,' . request()->route('driver')->id,
            ],
            'address' => [
                'string',
                'required',
            ],
            'transport' => [
                'required',
            ],
            'transport_image' => [
                'array',
            ],
            'status' => [
                'required',
            ],
            'cnic_no' => [
                'required',
            ],
            'cnic_start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'cnic_expire_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'store_name' => [
                'string',
                'required',
            ],
            'account_name' => [
                'string',
                'required',
            ],
            'current_balance' => [
                'required',
            ],
            'iban_no' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bank_name' => [
                'string',
                'required',
            ],
            'swift_code' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_orders' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_earning' => [
                'required',
            ],
            'transport_no' => [
                'string',
                'required',
            ],
            'provider' => [
                'required',
            ],
            'phone_no' => [
                'required',
            ],
            'wal_mobile_no' => [
                'required',
            ],
        ];
    }
}
