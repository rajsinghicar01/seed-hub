@extends('admin.layouts.admin-app')
@section('page_title', 'Zones')

@section('main_headeing', 'Zones')
@section('sub_headeing', 'Zone List')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    @can('zone-create')
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('zones.create') }}"><i
                class="fa fa-plus"></i> Create New Zone</a>
    </div>
    @endcan
</div>
<div class="card-body">
    <div class="row">
        <div class="col-lg-12 col-12">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success! </strong> {{ $message }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered data-table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Zone Name</th>
                            <th>States</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


@section('additional_js')
<script>
$(function() {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('zones.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'zone_name',
                name: 'zone_name'
            },
            {
                data: 'states',
                name: 'states'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

});

// Confirm before delete
function confirm_delete() {
    return confirm('Do you really want to delete this item?');
}
</script>
@endsection