@extends('admin.layouts.admin-app')
@section('page_title','Centres')

@section('main_headeing','Centres')
@section('sub_headeing','Centre Details')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('centres.index') }}"><i
                class="fa fa-arrow-left"></i> Back </a>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered data-table table-striped" style="width:100%">
                    <tbody>
                        <tr>
                            <th width="30%">Centre Name</th>
                            <td width="70%">{{ $centre->centre_name }}</td>
                        </tr>
                        <tr>
                            <th>Centre Address</th>
                            <td>{{ $centre->centre_address }}</td>
                        </tr>
                        <tr>
                            <th>Zone</th>
                            <td>{{ $centre->zone->zone_name }}</td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>{{ $centre->state->state_name }}</td>
                        </tr>
                        <tr>
                            <th>Pincode</th>
                            <td>{{ $centre->pincode }}</td>
                        </tr>
                        <tr>
                            <th>User</th>
                            <td>{{ $centre->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Controlling Authority </th>
                            <td>{{ $centre->controllingAuthority->authority_name }} ({{ $centre->controllingAuthority->responsive_person }})</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection