@extends('admin.layouts.admin-app')
@section('page_title','Users')

@section('main_headeing','Users')
@section('sub_headeing','Create New User')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('users.index') }}"><i
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

    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Name:<span class="text-danger">*</span></strong>
                    <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $user->name }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Email:<span class="text-danger">*</span></strong>
                    <input type="email" name="email" placeholder="Email" class="form-control"
                        value="{{ $user->email }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" placeholder="Phone" class="form-control" value="{{ $user->phone }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Designation:</strong>
                    <select name="designation_id" class="form-control">
                        <option value="">Select Designation</option>
                        @if(!empty($designations))
                        @foreach($designations as $designation)
                        <option value="{{$designation->id}}" {{ ($user->designation_id==$designation->id) ? 'selected' : '' }}>{{$designation->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="address" placeholder="Enter full address" class="form-control" value="{{ $user->address }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Pincode:</strong>
                    <input type="text" name="pincode" placeholder="Pincode" class="form-control" value="{{ $user->pincode }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Avatar:</strong>
                    <input type="file" name="avatar" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Password:<span class="text-danger">*</span></strong>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Role:<span class="text-danger">*</span></strong>
                    <select name="roles[]" class="form-control select2" multiple="multiple" data-placeholder="Select user role" >
                        @foreach ($roles as $value => $label)
                        <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : ''}}>
                            {{ $label }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Status:<span class="text-danger">*</span></strong>
                    <select name="status" class="form-control">
                        <option value="1" {{ ($user->status==1)? 'selected':'' }}>Active</option>
                        <option value="0" {{ ($user->status==0)? 'selected':'' }}>Inactive</option>
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