@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vendor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vendors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.id') }}
                        </th>
                        <td>
                            {{ $vendor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.name') }}
                        </th>
                        <td>
                            {{ $vendor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.business_name') }}
                        </th>
                        <td>
                            {{ $vendor->business_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Vendor::STATUS_SELECT[$vendor->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.featured') }}
                        </th>
                        <td>
                            {{ App\Models\Vendor::FEATURED_SELECT[$vendor->featured] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.promoted') }}
                        </th>
                        <td>
                            {{ App\Models\Vendor::PROMOTED_SELECT[$vendor->promoted] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.email') }}
                        </th>
                        <td>
                            {{ $vendor->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.phone') }}
                        </th>
                        <td>
                            {{ $vendor->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.address') }}
                        </th>
                        <td>
                            {{ $vendor->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.rating') }}
                        </th>
                        <td>
                            {{ $vendor->rating }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.payouts') }}
                        </th>
                        <td>
                            {{ $vendor->payouts }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.earning') }}
                        </th>
                        <td>
                            {{ $vendor->earning }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.cod_balance') }}
                        </th>
                        <td>
                            {{ $vendor->cod_balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.oniline_payment') }}
                        </th>
                        <td>
                            {{ $vendor->oniline_payment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.image') }}
                        </th>
                        <td>
                            @if($vendor->image)
                                <a href="{{ $vendor->image->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.cid_expiry_data') }}
                        </th>
                        <td>
                            {{ $vendor->cid_expiry_data }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.cid_no') }}
                        </th>
                        <td>
                            {{ $vendor->cid_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.cnic_image') }}
                        </th>
                        <td>
                            @if($vendor->cnic_image)
                                <a href="{{ $vendor->cnic_image->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.account_no') }}
                        </th>
                        <td>
                            {{ $vendor->account_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.opening_time') }}
                        </th>
                        <td>
                            {{ $vendor->opening_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.closing_time') }}
                        </th>
                        <td>
                            {{ $vendor->closing_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.business_type') }}
                        </th>
                        <td>
                            {{ App\Models\Vendor::BUSINESS_TYPE_SELECT[$vendor->business_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.bank_name') }}
                        </th>
                        <td>
                            {{ $vendor->bank_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.iban_no') }}
                        </th>
                        <td>
                            {{ $vendor->iban_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.swift_code') }}
                        </th>
                        <td>
                            {{ $vendor->swift_code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vendors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection