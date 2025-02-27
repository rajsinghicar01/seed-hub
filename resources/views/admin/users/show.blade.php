@extends('admin.layouts.admin-app')
@section('page_title','Users')

@section('main_headeing','Users')
@section('sub_headeing','User Details')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('users.index') }}"><i
                class="fa fa-arrow-left"></i> Back </a>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered data-table" style="width:100%">
                    <tbody>
                        <tr>
                            <td width="20%">
                                @if(!empty($user->avatar))
                                    @if(str_contains($user->avatar, 'https'))
                                        <img src="{{ $user->avatar }}" class="img img-responsive img-circle img-thumbnail" style="width:100%;">
                                    @else
                                        <img src="{{ asset('storage/profiles/' . $user->avatar) }}" class="img img-responsive img-circle img-thumbnail" style="width:100%;">
                                    @endif
                                @else
                                    <img src="{{ asset('storage/profiles/avatar.png') }}" class="img img-responsive img-circle img-thumbnail" style="width:100%;">
                                @endif
                            </td>
                            <td>
                                <table class="table table-bordered data-table table-striped" style="width:100%">
                                    <tbody>
                                        <tr>
                                            <th width="30%">Full Name</th>
                                            <td width="70%">{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{ ($user->phone)?'+91-'.$user->phone:'--' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Designation</th>
                                            <td>{{ ($user->designation)?$user->designation->name:'--' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ ($user->address)?$user->address:'--' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pincode</th>
                                            <td>{{ ($user->pincode)?$user->pincode:'--' }}</td>
                                        </tr>
                                        @if(($user->centre))
                                        <tr>
                                            <th>Centre</th>
                                            <td>{{ ($user->centre->centre_name)?$user->centre->centre_name:'' }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                @if($user->status)
                                                <label class="badge bg-success"><i class="fa fa-check-circle"
                                                        aria-hidden="true"></i> Active</label>
                                                @else
                                                <label class="badge bg-danger"><i class="fa fa-ban"
                                                        aria-hidden="true"></i> Inactive</label>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Roles</th>
                                            <td>
                                                @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection

@section('additional_css')
<style>
img {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>
@endsection