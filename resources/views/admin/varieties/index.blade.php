@extends('admin.layouts.admin-app')
@section('page_title', 'Varieties')

@section('main_headeing', 'Varieties')
@section('sub_headeing', 'Variety List')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    @can('variety-create')
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('varieties.create') }}"><i
                class="fa fa-plus"></i> Create New Variety</a>
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
                            <th>Crop Name</th>
                            <th>Varieties Name</th>
                            <th>Year of Notification</th>
                            <th>Average Yield</th>
                            <th>Oil Content</th>
                            <th>Day of Maturity</th>
                            <th>Release</th>
                            <th>Created By</th>
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
        ajax: "{{ route('varieties.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'crop_name',
                name: 'crop_name'
            },
            {
                data: 'variety_name',
                name: 'variety_name'
            },
            {
                data: 'year_of_notification',
                name: 'year_of_notification'
            },
            {
                data: 'average_yield',
                name: 'average_yield'
            },
            {
                data: 'oil_content',
                name: 'oil_content'
            },
            {
                data: 'day_of_maturity',
                name: 'day_of_maturity'
            },
            {
                data: 'release',
                name: 'release'
            },
            {
                data: 'created_by',
                name: 'created_by'
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