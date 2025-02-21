@extends('admin.layouts.admin-app')
@section('page_title','Revolving Funds')

@section('main_headeing','Revolving Funds')
@section('sub_headeing','Create New Revolving Fund')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('revolving-funds.index') }}"><i
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

    @if ($message = Session::get('error'))
        <div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning! </strong> {{ $message }}
        </div>
    @endif

    <form method="POST" action="{{ route('revolving-funds.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Centre Name:<span class="text-danger">*</span></strong>
                    <select name="centre_id" class="form-control">
                        <option value="">Choose centre name</option>
                        @if(!empty($centres))
                            @foreach($centres as $centre)
                            <option value="{{ $centre->id }}">{{ $centre->centre_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Season Name:<span class="text-danger">*</span></strong>
                    <select name="season_id" class="form-control">
                        <option value="">Choose season name</option>
                        @if(!empty($seasons))
                            @foreach($seasons as $season)
                            <option value="{{ $season->id }}">{{ $season->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Released Fund (in Lakhs):<span class="text-danger">*</span></strong>
                    <input type="text" name="released_fund" placeholder="Released Fund" class="form-control" value="{{ old('released_fund') }}">
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Infrastructure Fund (in Lakhs):</strong>
                    <input type="text" name="infrastructure_fund" id="infrastructure_fund" placeholder="Infrastructure Fund" class="form-control" value="{{ old('infrastructure_fund') }}">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Utilized Infrastructure Fund: <small class="text-danger">(Fill up by centre)</small></strong>
                    <input type="text" name="utilized_infrastructure_fund" id="utilized_infrastructure_fund" placeholder="Utilized Infrastructure Fund" readonly="{{ (isAdmin())?'true':'false' }}" class="form-control" value="0">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Available Infrastructure Fund: <small class="text-danger">(Fill up by centre)</small></strong>
                    <input type="text" name="available_infrastructure_fund" id="available_infrastructure_fund" placeholder="Available Infrastructure Fund" readonly="{{ (isAdmin())?'true':'false' }}" class="form-control" value="0">
                </div>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <button type="submit" class="btn btn-primary btn-flat">Submit</button>
        </div>
    </form>

</div>

@endsection