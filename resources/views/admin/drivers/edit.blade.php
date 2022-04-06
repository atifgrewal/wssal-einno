@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.driver.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.drivers.update", [$driver->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.driver.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $driver->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.driver.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $driver->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.driver.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $driver->address) }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profile">{{ trans('cruds.driver.fields.profile') }}</label>
                <div class="needsclick dropzone {{ $errors->has('profile') ? 'is-invalid' : '' }}" id="profile-dropzone">
                </div>
                @if($errors->has('profile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.profile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.driver.fields.transport') }}</label>
                <select class="form-control {{ $errors->has('transport') ? 'is-invalid' : '' }}" name="transport" id="transport" required>
                    <option value disabled {{ old('transport', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Driver::TRANSPORT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('transport', $driver->transport) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('transport'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transport') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.transport_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transport_image">{{ trans('cruds.driver.fields.transport_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('transport_image') ? 'is-invalid' : '' }}" id="transport_image-dropzone">
                </div>
                @if($errors->has('transport_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transport_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.transport_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.driver.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Driver::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $driver->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cnic_no">{{ trans('cruds.driver.fields.cnic_no') }}</label>
                <input class="form-control {{ $errors->has('cnic_no') ? 'is-invalid' : '' }}" type="number" name="cnic_no" id="cnic_no" value="{{ old('cnic_no', $driver->cnic_no) }}" step="0.01" required>
                @if($errors->has('cnic_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cnic_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.cnic_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cnic_start_date">{{ trans('cruds.driver.fields.cnic_start_date') }}</label>
                <input class="form-control date {{ $errors->has('cnic_start_date') ? 'is-invalid' : '' }}" type="text" name="cnic_start_date" id="cnic_start_date" value="{{ old('cnic_start_date', $driver->cnic_start_date) }}" required>
                @if($errors->has('cnic_start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cnic_start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.cnic_start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cnic_expire_date">{{ trans('cruds.driver.fields.cnic_expire_date') }}</label>
                <input class="form-control date {{ $errors->has('cnic_expire_date') ? 'is-invalid' : '' }}" type="text" name="cnic_expire_date" id="cnic_expire_date" value="{{ old('cnic_expire_date', $driver->cnic_expire_date) }}" required>
                @if($errors->has('cnic_expire_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cnic_expire_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.cnic_expire_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="store_name">{{ trans('cruds.driver.fields.store_name') }}</label>
                <input class="form-control {{ $errors->has('store_name') ? 'is-invalid' : '' }}" type="text" name="store_name" id="store_name" value="{{ old('store_name', $driver->store_name) }}" required>
                @if($errors->has('store_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('store_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.store_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_name">{{ trans('cruds.driver.fields.account_name') }}</label>
                <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', $driver->account_name) }}" required>
                @if($errors->has('account_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.account_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="current_balance">{{ trans('cruds.driver.fields.current_balance') }}</label>
                <input class="form-control {{ $errors->has('current_balance') ? 'is-invalid' : '' }}" type="number" name="current_balance" id="current_balance" value="{{ old('current_balance', $driver->current_balance) }}" step="0.01" required>
                @if($errors->has('current_balance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('current_balance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.current_balance_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="iban_no">{{ trans('cruds.driver.fields.iban_no') }}</label>
                <input class="form-control {{ $errors->has('iban_no') ? 'is-invalid' : '' }}" type="number" name="iban_no" id="iban_no" value="{{ old('iban_no', $driver->iban_no) }}" step="1" required>
                @if($errors->has('iban_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iban_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.iban_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bank_name">{{ trans('cruds.driver.fields.bank_name') }}</label>
                <input class="form-control {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $driver->bank_name) }}" required>
                @if($errors->has('bank_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.bank_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="swift_code">{{ trans('cruds.driver.fields.swift_code') }}</label>
                <input class="form-control {{ $errors->has('swift_code') ? 'is-invalid' : '' }}" type="number" name="swift_code" id="swift_code" value="{{ old('swift_code', $driver->swift_code) }}" step="1" required>
                @if($errors->has('swift_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('swift_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.swift_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_orders">{{ trans('cruds.driver.fields.total_orders') }}</label>
                <input class="form-control {{ $errors->has('total_orders') ? 'is-invalid' : '' }}" type="number" name="total_orders" id="total_orders" value="{{ old('total_orders', $driver->total_orders) }}" step="1" required>
                @if($errors->has('total_orders'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_orders') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.total_orders_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_earning">{{ trans('cruds.driver.fields.total_earning') }}</label>
                <input class="form-control {{ $errors->has('total_earning') ? 'is-invalid' : '' }}" type="number" name="total_earning" id="total_earning" value="{{ old('total_earning', $driver->total_earning) }}" step="0.01" required>
                @if($errors->has('total_earning'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_earning') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.total_earning_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transport_no">{{ trans('cruds.driver.fields.transport_no') }}</label>
                <input class="form-control {{ $errors->has('transport_no') ? 'is-invalid' : '' }}" type="text" name="transport_no" id="transport_no" value="{{ old('transport_no', $driver->transport_no) }}" required>
                @if($errors->has('transport_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transport_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.transport_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.driver.fields.provider') }}</label>
                <select class="form-control {{ $errors->has('provider') ? 'is-invalid' : '' }}" name="provider" id="provider" required>
                    <option value disabled {{ old('provider', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Driver::PROVIDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('provider', $driver->provider) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('provider'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provider') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.provider_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="wal_amount">{{ trans('cruds.driver.fields.wal_amount') }}</label>
                <input class="form-control {{ $errors->has('wal_amount') ? 'is-invalid' : '' }}" type="number" name="wal_amount" id="wal_amount" value="{{ old('wal_amount', $driver->wal_amount) }}" step="0.01">
                @if($errors->has('wal_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wal_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.wal_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_no">{{ trans('cruds.driver.fields.phone_no') }}</label>
                <input class="form-control {{ $errors->has('phone_no') ? 'is-invalid' : '' }}" type="number" name="phone_no" id="phone_no" value="{{ old('phone_no', $driver->phone_no) }}" step="0.01" required>
                @if($errors->has('phone_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.phone_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="wal_mobile_no">{{ trans('cruds.driver.fields.wal_mobile_no') }}</label>
                <input class="form-control {{ $errors->has('wal_mobile_no') ? 'is-invalid' : '' }}" type="number" name="wal_mobile_no" id="wal_mobile_no" value="{{ old('wal_mobile_no', $driver->wal_mobile_no) }}" step="0.01" required>
                @if($errors->has('wal_mobile_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wal_mobile_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.wal_mobile_no_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.profileDropzone = {
    url: '{{ route('admin.drivers.storeMedia') }}',
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
      $('form').find('input[name="profile"]').remove()
      $('form').append('<input type="hidden" name="profile" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="profile"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($driver) && $driver->profile)
      var file = {!! json_encode($driver->profile) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="profile" value="' + file.file_name + '">')
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
    var uploadedTransportImageMap = {}
Dropzone.options.transportImageDropzone = {
    url: '{{ route('admin.drivers.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="transport_image[]" value="' + response.name + '">')
      uploadedTransportImageMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedTransportImageMap[file.name]
      }
      $('form').find('input[name="transport_image[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($driver) && $driver->transport_image)
          var files =
            {!! json_encode($driver->transport_image) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="transport_image[]" value="' + file.file_name + '">')
            }
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