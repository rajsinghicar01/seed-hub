@extends('admin.layouts.admin-app')
@section('page_title', 'Designations')

@section('main_headeing', 'Designations')
@section('sub_headeing', 'Designation List')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    @can('designation-create')
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('designations.create') }}"><i
                class="fa fa-plus"></i> Create New Designation</a>
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
                <table class="table table-bordered data-table table-striped" id="designation-table" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Designation Name</th>
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
    var table = $('#designation-table').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'csv',
            text: '<i class="nav-icon fas fa-file-excel" aria-hidden="true"></i> Export to CSV',
            className: 'btn btn-primary',
            filename: 'designation_export', // Custom filename
            exportOptions: {
                columns: [0, 1] // Export specific columns (ID, Name, Email, Created At)
            }
        }],
        processing: true,
        serverSide: true,
        ajax: "{{ route('designations.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
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