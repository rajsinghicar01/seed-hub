@extends('admin.layouts.admin-app')
@section('page_title', 'Activity Logs')

@section('main_headeing', 'Activity Logs')
@section('sub_headeing', 'Activity Logs')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
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
                            <th>Description</th>
                            <th>Event</th>
                            <th>Subject</th>
                            <th>Causer</th>
                            <th>Message</th>
                            <th>Created at</th>
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
        ajax: "{{ route('activity.logs') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'event',
                name: 'evnt'
            },
            {
                data: 'subject_id',
                name: 'subject_id'
            },
            {
                data: 'causer_id',
                name: 'causer_id'
            },
            {
                data: 'properties',
                name: 'properties'
            },
            {
                data: 'created_at',
                name: 'created_at'
            }
        ]
    });

});

// Confirm before delete
function confirm_delete() {
    return confirm('Do you really want to delete this item?');
}
</script>
@endsection