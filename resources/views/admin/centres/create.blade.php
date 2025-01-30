@extends('admin.layouts.admin-app')
@section('page_title','Centres')

@section('main_headeing','Centres')
@section('sub_headeing','Create New Centre')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('centres.index') }}"><i
                class="fa fa-arrow-left"></i> Back </a>
    </div>
</div>
<div class="card-body">

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Something went wrong.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('centres.store') }}">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Centre Name:<span class="text-danger">*</span></strong>
                    <input type="text" name="centre_name" placeholder="Centre Name" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Centre Address:<span class="text-danger">*</span></strong>
                    <input type="text" name="centre_address" placeholder="Centre address" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Zone:<span class="text-danger">*</span></strong>
                    <select name="zone_id" id="zone-dropdown" class="form-control">
                        <option value="">Choose zone</option>
                        @if(!empty($zones))
                        @foreach($zones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->zone_name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>State:<span class="text-danger">*</span></strong>
                    <select name="state_id" id="state-dropdown" class="form-control">
                        <option value="">Select zone first</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pincode:<span class="text-danger">*</span></strong>
                    <input type="text" name="pincode" placeholder="Pincode" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User:<span class="text-danger">*</span></strong>
                    <select name="user_id" class="form-control">
                        <option value="">Choose user</option>
                        @if(!empty($users))
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} : {{ $user->email }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Controlling Authority:<span class="text-danger">*</span></strong>
                    <select name="controlling_authority_id" class="form-control">
                        <option value="">Choose Controlling Authority</option>
                        @if(!empty($controlling_authorities))
                        @foreach($controlling_authorities as $controlling_authority)
                        <option value="{{ $controlling_authority->id }}">{{ $controlling_authority->authority_name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
            </div>
        </div>
    </form>

</div>

@endsection

@section('additional_js')
<script>
$(document).ready(function() {
    $('#zone-dropdown').on('change', function() {
        var zone_id = this.value;
        $("#state-dropdown").html('');
        $.ajax({
            url: "{{ route('get_states_by_zone') }}",
            type: "POST",
            data: {
                zone_id: zone_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#state-dropdown').html('<option value="">Select State</option>');
                $.each(result.states, function(key, value) {
                    $("#state-dropdown").append('<option value="' + value.id + '">' + value.state_name + '</option>');
                });
            }
        });
    });
});
</script>
@endsection