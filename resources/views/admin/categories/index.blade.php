@extends('admin.layouts.admin-app')
@section('page_title', 'Seed Categories')

@section('main_headeing', 'Seed Categories')
@section('sub_headeing', 'Seed Category List')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    @can('category-create')
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('categories.create') }}"><i
                class="fa fa-plus"></i> Create New Seed Category</a>
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
                            <th>Name</th>
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
        ajax: "{{ route('categories.index') }}",
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