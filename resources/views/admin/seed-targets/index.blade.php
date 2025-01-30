@extends('admin.layouts.admin-app')
@section('page_title', 'Seed Targets')

@section('main_headeing', 'Seed Targets')
@section('sub_headeing', 'Seed Target List')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    @can('seed-target-create')
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('seed-targets.create') }}"><i
                class="fa fa-plus"></i> Create New Seed Target</a>
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
                            <th>Centre Name</th>
                            <th>Crop Season</th>
                            <th>Crop Name</th>
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
        ajax: "{{ route('seed-targets.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'centre_id',
                name: 'centre_id'
            },
            {
                data: 'season_id',
                name: 'season_id'
            },
            {
                data: 'crop_id',
                name: 'crop_id'
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