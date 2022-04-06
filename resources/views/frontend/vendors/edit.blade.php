@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.vendor.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.vendors.update", [$vendor->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.vendor.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $vendor->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="business_name">{{ trans('cruds.vendor.fields.business_name') }}</label>
                            <input class="form-control" type="text" name="business_name" id="business_name" value="{{ old('business_name', $vendor->business_name) }}" required>
                            @if($errors->has('business_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('business_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.business_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.vendor.fields.status') }}</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Vendor::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $vendor->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.vendor.fields.featured') }}</label>
                            <select class="form-control" name="featured" id="featured" required>
                                <option value disabled {{ old('featured', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Vendor::FEATURED_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('featured', $vendor->featured) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('featured'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('featured') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.featured_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.vendor.fields.promoted') }}</label>
                            <select class="form-control" name="promoted" id="promoted" required>
                                <option value disabled {{ old('promoted', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Vendor::PROMOTED_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('promoted', $vendor->promoted) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('promoted'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('promoted') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.promoted_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.vendor.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $vendor->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="phone">{{ trans('cruds.vendor.fields.phone') }}</label>
                            <input class="form-control" type="number" name="phone" id="phone" value="{{ old('phone', $vendor->phone) }}" step="1" required>
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="address">{{ trans('cruds.vendor.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $vendor->address) }}" required>
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="rating">{{ trans('cruds.vendor.fields.rating') }}</label>
                            <input class="form-control" type="number" name="rating" id="rating" value="{{ old('rating', $vendor->rating) }}" step="0.1" required max="7">
                            @if($errors->has('rating'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('rating') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.rating_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="payouts">{{ trans('cruds.vendor.fields.payouts') }}</label>
                            <input class="form-control" type="number" name="payouts" id="payouts" value="{{ old('payouts', $vendor->payouts) }}" step="1" required>
                            @if($errors->has('payouts'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payouts') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.payouts_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="earning">{{ trans('cruds.vendor.fields.earning') }}</label>
                            <input class="form-control" type="text" name="earning" id="earning" value="{{ old('earning', $vendor->earning) }}">
                            @if($errors->has('earning'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('earning') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.earning_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="cod_balance">{{ trans('cruds.vendor.fields.cod_balance') }}</label>
                            <input class="form-control" type="number" name="cod_balance" id="cod_balance" value="{{ old('cod_balance', $vendor->cod_balance) }}" step="1" required>
                            @if($errors->has('cod_balance'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cod_balance') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.cod_balance_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="oniline_payment">{{ trans('cruds.vendor.fields.oniline_payment') }}</label>
                            <input class="form-control" type="number" name="oniline_payment" id="oniline_payment" value="{{ old('oniline_payment', $vendor->oniline_payment) }}" step="1" required>
                            @if($errors->has('oniline_payment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('oniline_payment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.oniline_payment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="image">{{ trans('cruds.vendor.fields.image') }}</label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            @if($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="cid_expiry_data">{{ trans('cruds.vendor.fields.cid_expiry_data') }}</label>
                            <input class="form-control date" type="text" name="cid_expiry_data" id="cid_expiry_data" value="{{ old('cid_expiry_data', $vendor->cid_expiry_data) }}" required>
                            @if($errors->has('cid_expiry_data'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cid_expiry_data') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.cid_expiry_data_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="cid_no">{{ trans('cruds.vendor.fields.cid_no') }}</label>
                            <input class="form-control" type="number" name="cid_no" id="cid_no" value="{{ old('cid_no', $vendor->cid_no) }}" step="0.01" required>
                            @if($errors->has('cid_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cid_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.cid_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="cnic_image">{{ trans('cruds.vendor.fields.cnic_image') }}</label>
                            <div class="needsclick dropzone" id="cnic_image-dropzone">
                            </div>
                            @if($errors->has('cnic_image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cnic_image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.cnic_image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="account_no">{{ trans('cruds.vendor.fields.account_no') }}</label>
                            <input class="form-control" type="text" name="account_no" id="account_no" value="{{ old('account_no', $vendor->account_no) }}" required>
                            @if($errors->has('account_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('account_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.account_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="opening_time">{{ trans('cruds.vendor.fields.opening_time') }}</label>
                            <input class="form-control datetime" type="text" name="opening_time" id="opening_time" value="{{ old('opening_time', $vendor->opening_time) }}" required>
                            @if($errors->has('opening_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('opening_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.opening_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="closing_time">{{ trans('cruds.vendor.fields.closing_time') }}</label>
                            <input class="form-control datetime" type="text" name="closing_time" id="closing_time" value="{{ old('closing_time', $vendor->closing_time) }}" required>
                            @if($errors->has('closing_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('closing_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.closing_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.vendor.fields.business_type') }}</label>
                            <select class="form-control" name="business_type" id="business_type" required>
                                <option value disabled {{ old('business_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Vendor::BUSINESS_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('business_type', $vendor->business_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('business_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('business_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.business_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="bank_name">{{ trans('cruds.vendor.fields.bank_name') }}</label>
                            <input class="form-control" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $vendor->bank_name) }}" required>
                            @if($errors->has('bank_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.bank_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="iban_no">{{ trans('cruds.vendor.fields.iban_no') }}</label>
                            <input class="form-control" type="text" name="iban_no" id="iban_no" value="{{ old('iban_no', $vendor->iban_no) }}" required>
                            @if($errors->has('iban_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('iban_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.iban_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="swift_code">{{ trans('cruds.vendor.fields.swift_code') }}</label>
                            <input class="form-control" type="text" name="swift_code" id="swift_code" value="{{ old('swift_code', $vendor->swift_code) }}" required>
                            @if($errors->has('swift_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('swift_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vendor.fields.swift_code_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('frontend.vendors.storeMedia') }}',
    maxFilesize: 5, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($vendor) && $vendor->image)
      var file = {!! json_encode($vendor->image) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.cnicImageDropzone = {
    url: '{{ route('frontend.vendors.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="cnic_image"]').remove()
      $('form').append('<input type="hidden" name="cnic_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cnic_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($vendor) && $vendor->cnic_image)
      var file = {!! json_encode($vendor->cnic_image) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cnic_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection