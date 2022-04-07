<?php

namespace App\Http\Requests;

use App\Models\SubCat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubCatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sub_cat_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'parent_cateory_id' => [
                'required',
                'integer',
            ],
            'photo' => [
                'array',
            ],
        ];
    }
}
