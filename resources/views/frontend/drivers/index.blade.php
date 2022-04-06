@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('driver_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.drivers.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.driver.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Driver', 'route' => 'admin.drivers.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.driver.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Driver">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.profile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.transport') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.transport_image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.cnic_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.cnic_start_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.cnic_expire_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.store_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.account_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.current_balance') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.iban_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.bank_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.swift_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.total_orders') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.total_earning') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.transport_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.provider') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.wal_amount') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.phone_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.wal_mobile_no') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($drivers as $key => $driver)
                                    <tr data-entry-id="{{ $driver->id }}">
                                        <td>
                                            {{ $driver->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->address ?? '' }}
                                        </td>
                                        <td>
                                            @if($driver->profile)
                                                <a href="{{ $driver->profile->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ App\Models\Driver::TRANSPORT_SELECT[$driver->transport] ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($driver->transport_image as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ App\Models\Driver::STATUS_SELECT[$driver->status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->cnic_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->cnic_start_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->cnic_expire_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->store_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->account_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->current_balance ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->iban_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->bank_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->swift_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->total_orders ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->total_earning ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->transport_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Driver::PROVIDER_SELECT[$driver->provider] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->wal_amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->phone_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->wal_mobile_no ?? '' }}
                                        </td>
                                        <td>
                                            @can('driver_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.drivers.show', $driver->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('driver_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.drivers.edit', $driver->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('driver_delete')
                                                <form action="{{ route('frontend.drivers.destroy', $driver->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('driver_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.drivers.massDestroy') }}",
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
  let table = $('.datatable-Driver:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection