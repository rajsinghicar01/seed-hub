@extends('admin.layouts.admin-app')
@section('page_title','Revolving Fund Allocation')

@section('main_headeing','Revolving Fund Allocation')
@section('sub_headeing','Allocate New Revolving Fund')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('revolving-fund-allocations.index') }}"><i
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

    <form method="POST" action="{{ route('revolving-fund-allocations.store') }}">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Centre Name:<span class="text-danger">*</span></strong>
                    <select name="centre_id" class="form-control">
                        <option value="">Choose Zone</option>
                        @if(!empty($centres))
                        @foreach($centres as $centre)
                        <option value="{{ $centre->id }}">{{ $centre->centre_name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Season:<span class="text-danger">*</span></strong>
                    <select name="season" class="form-control">
                        <option value="">Choose Season</option>
                        @foreach($seasons as $season)
                        <option value="{{ $season->id }}">{{ $season->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Fund Allocation:<span class="text-danger">*</span></strong>
                    <input type="text" name="total_fund_allocation" placeholder="Total Fund Allocation" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
            </div>
        </div>
    </form>

</div>

@endsection