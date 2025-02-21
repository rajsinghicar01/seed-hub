@extends('admin.layouts.admin-app')
@section('page_title','Revolving Fund Allocation')

@section('main_headeing','Revolving Fund Allocation')
@section('sub_headeing','Edit Revolving Fund Allocation')

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
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Whoops!</strong> Something went wrong.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form method="POST" action="{{ route('revolving-fund-allocations.update', $fund->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Centre Name:<span class="text-danger">*</span></strong>
                    <select name="centre_id" class="form-control">
                        <option value="">Choose Zone</option>
                        @if(!empty($centres))
                        @foreach($centres as $centre)
                        <option value="{{ $centre->id }}" {{ ($fund->centre_id == $centre->id)?'selected':'' }}>{{ $centre->centre_name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Fund Allocation:<span class="text-danger">*</span></strong>
                    <input type="text" name="total_fund_allocation" placeholder="Total Fund Allocation" value="{{ $fund->total_fund_allocation }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
            </div>
        </div>
    </form>

</div>

@endsection