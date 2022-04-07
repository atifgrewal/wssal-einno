@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.attributedetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.attributedetails.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.attributedetail.fields.id') }}
                        </th>
                        <td>
                            {{ $attributedetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.attributedetail.fields.value') }}
                        </th>
                        <td>
                            {{ $attributedetail->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.attributedetail.fields.attribute') }}
                        </th>
                        <td>
                            @foreach($attributedetail->attributes as $key => $attribute)
                                <span class="label label-info">{{ $attribute->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.attributedetails.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection