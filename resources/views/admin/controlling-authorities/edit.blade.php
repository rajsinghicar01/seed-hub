@extends('admin.layouts.admin-app')
@section('page_title','Controlling Authorities')

@section('main_headeing','Controlling Authorities')
@section('sub_headeing','Create New Controlling Authority')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('controlling-authorities.index') }}"><i
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

    <form method="POST" action="{{ route('controlling-authorities.update', $controllingAuthority->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Responsive Person:<span class="text-danger">*</span></strong>
                    <input type="text" name="responsive_person" placeholder="Responsive person" class="form-control" value="{{ $controllingAuthority->responsive_person }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Designation Name:<span class="text-danger">*</span></strong>
                    <select name="designation_id" class="form-control">
                        <option value="">Choose designation</option>
                        @if(!empty($designations))
                        @foreach($designations as $designation)
                        <option value="{{ $designation->id }}" {{ ($designation->id==$controllingAuthority->designation->id)?'selected':'' }}>{{ $designation->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Authority Name:<span class="text-danger">*</span></strong>
                    <input type="text" name="authority_name" placeholder="Authority Name" class="form-control" value="{{ $controllingAuthority->authority_name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone No:<span class="text-danger">*</span></strong>
                    <input type="text" name="phone_no" placeholder="Phone No" class="form-control" value="{{ $controllingAuthority->phone_no }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:<span class="text-danger">*</span></strong>
                    <input type="email" name="email" placeholder="Email" class="form-control" value="{{ $controllingAuthority->email }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
            </div>
        </div>
    </form>

</div>

@endsection