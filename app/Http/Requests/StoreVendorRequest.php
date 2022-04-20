<?php

namespace App\Http\Requests;

use App\Models\Vendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVendorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vendor_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:225',
                'required',
            ],
            'business_name' => [
                'string',
                'max:225',
                'required',
                // 'unique:vendors',
            ],
            // 'status' => [
            //     'required',
            // ],
            // 'featured' => [
            //     'required',
            // ],
            // 'promoted' => [
            //     'required',
            // ],
            // 'email' => [
            //     'required',
            //     'unique:vendors',
            // ],
            'phone' => [
                // 'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'address' => [
                'string',
                'max:225',
                'required',
            ],
            // 'rating' => [
            //     'numeric',
            //     'required',
            //     'max:7',
            // ],
            // 'payouts' => [
            //     'required',
            //     'integer',
            //     'min:-2147483648',
            //     'max:2147483647',
            // ],
            // 'earning' => [
            //     'string',
            //     'max:225',
            //     'nullable',
            // ],
            // 'cod_balance' => [
            //     'required',
            //     'integer',
            //     'min:-2147483648',
            //     'max:2147483647',
            // ],
            // 'oniline_payment' => [
            //     'required',
            //     'integer',
            //     'min:-2147483648',
            //     'max:2147483647',
            // ],
            // 'image' => [
            //     'required',
            // ],
            'cid_expiry_data' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'cid_no' => [
                'required',
            ],
            'cnic_image' => [
                'required',
            ],
            // 'account_no' => [
            //     'string',
            //     'required',
            // ],
            // 'opening_time' => [
            //     'required',
            //     'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            // ],
            // 'closing_time' => [
            //     'required',
            //     'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            // ],
            // 'business_type' => [
            //     'required',
            // ],
            // 'bank_name' => [
            //     'string',
            //     'required',
            // ],
            // 'iban_no' => [
            //     'string',
            //     'required',
            // ],
            // 'swift_code' => [
            //     'string',
            //     'required',
            // ],
        ];
    }
}
