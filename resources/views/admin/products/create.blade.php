@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.product.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_category_id">{{ trans('cruds.product.fields.sub_category') }}</label>
                <select class="form-control select2 {{ $errors->has('sub_category') ? 'is-invalid' : '' }}" name="sub_category_id" id="sub_category_id">
                    @foreach($sub_categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('sub_category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.sub_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tags">{{ trans('cruds.product.fields.tag') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
                    @foreach($tags as $id => $tag)
                        <option value="{{ $id }}" {{ in_array($id, old('tags', [])) ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.tag_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="variation_id">{{ trans('cruds.product.fields.variation') }}</label>
                <select class="form-control select2 {{ $errors->has('variation') ? 'is-invalid' : '' }}" name="variation_id" id="variation_id" required>
                    @foreach($variations as $id => $entry)
                        <option value="{{ $id }}" {{ old('variation_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('variation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('variation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.variation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unit_id">{{ trans('cruds.product.fields.unit') }}</label>
                <select class="form-control select2 {{ $errors->has('unit') ? 'is-invalid' : '' }}" name="unit_id" id="unit_id" required>
                    @foreach($units as $id => $entry)
                        <option value="{{ $id }}" {{ old('unit_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('unit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.unit_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.product.fields.featured') }}</label>
                <select class="form-control {{ $errors->has('featured') ? 'is-invalid' : '' }}" name="featured" id="featured">
                    <option value disabled {{ old('featured', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Product::FEATURED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('featured', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('featured'))
                    <div class="invalid-feedback">
                        {{ $errors->first('featured') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.featured_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="regular_price">{{ trans('cruds.product.fields.regular_price') }}</label>
                <input class="form-control {{ $errors->has('regular_price') ? 'is-invalid' : '' }}" type="number" name="regular_price" id="regular_price" value="{{ old('regular_price', '') }}" step="0.01">
                @if($errors->has('regular_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('regular_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.regular_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sale_price">{{ trans('cruds.product.fields.sale_price') }}</label>
                <input class="form-control {{ $errors->has('sale_price') ? 'is-invalid' : '' }}" type="number" name="sale_price" id="sale_price" value="{{ old('sale_price', '') }}" step="0.01" required>
                @if($errors->has('sale_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sale_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.sale_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sku">{{ trans('cruds.product.fields.sku') }}</label>
                <input class="form-control {{ $errors->has('sku') ? 'is-invalid' : '' }}" type="number" name="sku" id="sku" value="{{ old('sku', '0') }}" step="1" required>
                @if($errors->has('sku'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sku') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.sku_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qty">{{ trans('cruds.product.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', '1') }}" step="1" required>
                @if($errors->has('qty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fetaured_image">{{ trans('cruds.product.fields.fetaured_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('fetaured_image') ? 'is-invalid' : '' }}" id="fetaured_image-dropzone">
                </div>
                @if($errors->has('fetaured_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fetaured_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.fetaured_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vendor">{{ trans('cruds.product.fields.vendor') }}</label>
                <input class="form-control {{ $errors->has('vendor') ? 'is-invalid' : '' }}" type="number" name="vendor" id="vendor" value="{{ old('vendor', '') }}" step="1" required>
                @if($errors->has('vendor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vendor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.vendor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.product.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.image_helper') }}</span>
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
    Dropzone.options.fetauredImageDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
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
      $('form').find('input[name="fetaured_image"]').remove()
      $('form').append('<input type="hidden" name="fetaured_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="fetaured_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($product) && $product->fetaured_image)
      var file = {!! json_encode($product->fetaured_image) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="fetaured_image" value="' + file.file_name + '">')
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
    var uploadedImageMap = {}
Dropzone.options.imageDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
    maxFilesize: 5, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
      uploadedImageMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImageMap[file.name]
      }
      $('form').find('input[name="image[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($product) && $product->image)
          var files =
            {!! json_encode($product->image) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '">')
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