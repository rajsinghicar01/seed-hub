@extends('admin.layouts.admin-app')
@section('page_title','Seed Production Statuses')

@section('main_headeing','Seed Production Statuses')
@section('sub_headeing','Create New Seed Production Status')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('seed-production-statuses.index') }}"><i
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

    <form method="POST" action="{{ route('seed-production-statuses.store') }}">
        @csrf
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity Produced:<span class="text-danger">*</span></strong>
                    <input type="text" name="quantity_produced" class="form-control" placeholder="Enter quantity produced">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Seed Available for Sale:<span class="text-danger">*</span></strong>
                    <input type="text" name="seed_available_for_sale" class="form-control" placeholder="Enter seed available for sale">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Seed Price:<span class="text-danger">*</span></strong>
                    <input type="text" name="seed_price" class="form-control" placeholder="Enter seed price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reserved Seed:<span class="text-danger">*</span></strong>
                    <input type="text" name="reserved_seed" class="form-control" placeholder="Enter reserved seed">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Seed Target:<span class="text-danger">*</span></strong>
                    <select name="seed_target_id" class="form-control">
                        <option value="">Choose Seed Target</option>
                        @if(!empty($seed_targets))
                        @foreach($seed_targets as $seed_target)
                        <option value="{{ $seed_target->id }}">{{ $seed_target->name }}</option>
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

