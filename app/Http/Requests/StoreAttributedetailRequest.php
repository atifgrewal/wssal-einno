<?php

namespace App\Http\Requests;

use App\Models\Attributedetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAttributedetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('attributedetail_create');
    }

    public function rules()
    {
        return [
            'value' => [
                'string',
                'max:225',
                'required',
            ],
            'attributes.*' => [
                'integer',
            ],
            'attributes' => [
                'required',
                'array',
            ],
        ];
    }
}
