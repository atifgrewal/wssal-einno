@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.orders.update", [$order->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="products">{{ trans('cruds.order.fields.product') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="products[]" id="products" multiple required>
                                @foreach($products as $id => $product)
                                    <option value="{{ $id }}" {{ (in_array($id, old('products', [])) || $order->products->contains($id)) ? 'selected' : '' }}>{{ $product }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('products'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('products') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="driver_id">{{ trans('cruds.order.fields.driver') }}</label>
                            <select class="form-control select2" name="driver_id" id="driver_id" required>
                                @foreach($drivers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('driver_id') ? old('driver_id') : $order->driver->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('driver'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('driver') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.driver_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="customer_id">{{ trans('cruds.order.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id" required>
                                @foreach($customers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $order->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.customer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="quantity">{{ trans('cruds.order.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $order->quantity) }}" step="0.01" required>
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="payment">{{ trans('cruds.order.fields.payment') }}</label>
                            <input class="form-control" type="number" name="payment" id="payment" value="{{ old('payment', $order->payment) }}" step="0.01" required>
                            @if($errors->has('payment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.payment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.order.fields.status') }}</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Order::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $order->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection