@extends('admin.layouts.admin-app')
@section('page_title', 'Controlling Authorities')

@section('main_headeing', 'Controlling Authorities')
@section('sub_headeing', 'Controlling Authority List')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    @can('controlling-authority-create')
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('controlling-authorities.create') }}"><i
                class="fa fa-plus"></i> Create New Controlling Authority</a>
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
                            <th>Responsive Person</th>
                            <th>Designation</th>
                            <th>Authority Name</th>
                            <th>Phone No</th>
                            <th>Email</th>
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
        ajax: "{{ route('controlling-authorities.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'responsive_person',
                name: 'responsive_person'
            },
            {
                data: 'designation_id',
                name: 'designation_id'
            },
            {
                data: 'authority_name',
                name: 'authority_name'
            },
            {
                data: 'phone_no',
                name: 'phone_no'
            },
            {
                data: 'email',
                name: 'email'
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