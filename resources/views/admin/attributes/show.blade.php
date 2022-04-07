@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.attribute.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.attributes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.attribute.fields.id') }}
                        </th>
                        <td>
                            {{ $attribute->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.attribute.fields.name') }}
                        </th>
                        <td>
                            {{ $attribute->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.attributes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#attribute_products" role="tab" data-toggle="tab">
                {{ trans('cruds.product.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#attribute_attributedetails" role="tab" data-toggle="tab">
                {{ trans('cruds.attributedetail.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="attribute_products">
            @includeIf('admin.attributes.relationships.attributeProducts', ['products' => $attribute->attributeProducts])
        </div>
        <div class="tab-pane" role="tabpanel" id="attribute_attributedetails">
            @includeIf('admin.attributes.relationships.attributeAttributedetails', ['attributedetails' => $attribute->attributeAttributedetails])
        </div>
    </div>
</div>

@endsection