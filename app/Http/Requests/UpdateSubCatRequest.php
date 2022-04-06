<?php

namespace App\Http\Requests;

use App\Models\SubCat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubCatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sub_cat_edit');
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
                'required',
            ],
            'photo.*' => [
                'required',
            ],
        ];
    }
}
