@extends('admin.layouts.admin-app')
@section('page_title', 'Revolving Fund Management')

@section('main_headeing', 'Revolving Fund')
@section('sub_headeing', 'Revolving Fund List')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    @can('revolving-fund-create')
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('revolving-funds.create') }}"><i
                class="fa fa-plus"></i>
            Create New Revolving Fund </a>
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

            @if ($message = Session::get('error'))
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning! </strong> {{ $message }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped data-table" id="example1" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Centre Name</th>
                            <th>Season</th>
                            <th>Released Fund (in Lakhs)</th>
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
        dom: 'Bfrtip',
        buttons: [{
            extend: 'csv',
            text: '<i class="nav-icon fas fa-file-excel" aria-hidden="true"></i> Export to CSV',
            className: 'btn btn-primary',
            filename: 'revolving_fund_export',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        }],
        processing: true,
        serverSide: true,
        exportOptions: true,
        ajax: "{{ route('revolving-funds.index') }}",
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
                data: 'released_fund',
                name: 'released_fund'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
        
    });

});

// Confirm before delete
function confirm_delete() {
    return confirm('Do you really want to delete this item?');
}
</script>
@endsection