@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.driver.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.drivers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $driver->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $driver->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $driver->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $driver->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.profile') }}
                                    </th>
                                    <td>
                                        @if($driver->profile)
                                            <a href="{{ $driver->profile->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.transport') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Driver::TRANSPORT_SELECT[$driver->transport] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.transport_image') }}
                                    </th>
                                    <td>
                                        @foreach($driver->transport_image as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Driver::STATUS_SELECT[$driver->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.cnic_no') }}
                                    </th>
                                    <td>
                                        {{ $driver->cnic_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.cnic_start_date') }}
                                    </th>
                                    <td>
                                        {{ $driver->cnic_start_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.cnic_expire_date') }}
                                    </th>
                                    <td>
                                        {{ $driver->cnic_expire_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.store_name') }}
                                    </th>
                                    <td>
                                        {{ $driver->store_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.account_name') }}
                                    </th>
                                    <td>
                                        {{ $driver->account_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.current_balance') }}
                                    </th>
                                    <td>
                                        {{ $driver->current_balance }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.iban_no') }}
                                    </th>
                                    <td>
                                        {{ $driver->iban_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.bank_name') }}
                                    </th>
                                    <td>
                                        {{ $driver->bank_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.swift_code') }}
                                    </th>
                                    <td>
                                        {{ $driver->swift_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.total_orders') }}
                                    </th>
                                    <td>
                                        {{ $driver->total_orders }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.total_earning') }}
                                    </th>
                                    <td>
                                        {{ $driver->total_earning }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.transport_no') }}
                                    </th>
                                    <td>
                                        {{ $driver->transport_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.provider') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Driver::PROVIDER_SELECT[$driver->provider] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.wal_amount') }}
                                    </th>
                                    <td>
                                        {{ $driver->wal_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.phone_no') }}
                                    </th>
                                    <td>
                                        {{ $driver->phone_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.wal_mobile_no') }}
                                    </th>
                                    <td>
                                        {{ $driver->wal_mobile_no }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.drivers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection