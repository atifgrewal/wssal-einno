@extends('layouts.admin')
@section('content')
@can('vendor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.vendors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.vendor.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Vendor', 'route' => 'admin.vendors.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.vendor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Vendor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.business_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.featured') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.promoted') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.rating') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.payouts') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.earning') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.cod_balance') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.oniline_payment') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.cid_expiry_data') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.cid_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.cnic_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.account_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.opening_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.closing_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.business_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.bank_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.iban_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.vendor.fields.swift_code') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendors as $key => $vendor)
                        <tr data-entry-id="{{ $vendor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $vendor->id ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->name ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->business_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Vendor::STATUS_SELECT[$vendor->status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Vendor::FEATURED_SELECT[$vendor->featured] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Vendor::PROMOTED_SELECT[$vendor->promoted] ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->email ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->phone ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->address ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->rating ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->payouts ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->earning ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->cod_balance ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->oniline_payment ?? '' }}
                            </td>
                            <td>
                                @if($vendor->image)
                                    <a href="{{ $vendor->image->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $vendor->cid_expiry_data ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->cid_no ?? '' }}
                            </td>
                            <td>
                                @if($vendor->cnic_image)
                                    <a href="{{ $vendor->cnic_image->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $vendor->account_no ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->opening_time ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->closing_time ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Vendor::BUSINESS_TYPE_SELECT[$vendor->business_type] ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->bank_name ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->iban_no ?? '' }}
                            </td>
                            <td>
                                {{ $vendor->swift_code ?? '' }}
                            </td>
                            <td>
                                @can('vendor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.vendors.show', $vendor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('vendor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.vendors.edit', $vendor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('vendor_delete')
                                    <form action="{{ route('admin.vendors.destroy', $vendor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('vendor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vendors.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Vendor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection