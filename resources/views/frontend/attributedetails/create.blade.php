@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.attributedetail.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.attributedetails.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="value">{{ trans('cruds.attributedetail.fields.value') }}</label>
                            <input class="form-control" type="text" name="value" id="value" value="{{ old('value', '') }}" required>
                            @if($errors->has('value'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('value') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.attributedetail.fields.value_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="attributes">{{ trans('cruds.attributedetail.fields.attribute') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="attributes[]" id="attributes" multiple required>
                                @foreach($attributes as $id => $attribute)
                                    <option value="{{ $id }}" {{ in_array($id, old('attributes', [])) ? 'selected' : '' }}>{{ $attribute }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('attributes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('attributes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.attributedetail.fields.attribute_helper') }}</span>
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