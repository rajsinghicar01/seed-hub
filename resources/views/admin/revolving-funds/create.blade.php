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
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h5 class="card-title m-0">Revolving Fund Status</h5>
                    </div>
                    <div class="card-body">
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
                                    <input type="text" name="released_fund" placeholder="Released Fund"
                                        class="form-control" value="{{ old('released_fund') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h5 class="card-title m-0">Infrastructure Funds</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Infrastructure Fund (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="infrastructure_fund" placeholder="Infrastructure Fund (in Lakhs)" class="form-control" value="{{ old('infrastructure_fund') }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Utilized Infrastructure Fund (in Lakhs): <small class="text-danger">(Fill up by centre)</small></strong>
                                    <input type="text" name="utilized_infrastructure_fund" placeholder="Utilized Infrastructure Fund (in Lakhs)" class="form-control" value="{{ old('utilized_infrastructure_fund') }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Available Infrastructure Fund (in Lakhs): <small class="text-danger">(Fill up by centre)</small></strong>
                                    <input type="text" name="available_infrastructure_fund" placeholder="Available Infrastructure Fund (in Lakhs)" class="form-control" value="{{ old('available_infrastructure_fund') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h5 class="card-title m-0">Expenditures <small class="text-danger">(Fill up by centre)</small></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Training Organized (Rs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="training_organized" class="form-control" placeholder="Training Organized (Rs)" value="{{ old('training_organized') }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Field Day (Rs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="field_day" class="form-control" placeholder="Field Day (Rs)" value="{{ old('field_day') }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Seed Procurement (Rs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_procurement" placeholder="Seed Procurement (Rs)" class="form-control" value="{{ old('seed_procurement') }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Seed Quantity:<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_quantity" placeholder="Seed Quantity" class="form-control" value="{{ old('seed_quantity') }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Procurement Rate (Rs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="procurement_rate" placeholder="Procurement Rate (Rs)" class="form-control" value="{{ old('released_fund') }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Farm Operations (Rs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="farm_operations" placeholder="Farm Operations (Rs)" class="form-control" value="{{ old('farm_operations') }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Other Activities (Rs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="other_activities" placeholder="Other Activities (Rs)" class="form-control" value="{{ old('other_activities') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h5 class="card-title m-0">Incomes <small class="text-danger">(Fill up by centre)</small></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Seed Sold (Qtl):<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_sold" placeholder="Seed Sold (Qtl)" class="form-control" value="{{ old('seed_sold') }}">
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Rate (Rs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_sold_rate" placeholder="Seed Sold Rate" class="form-control" value="{{ old('seed_sold_rate') }}">
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Amount Receipt (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="amount_receipt" placeholder="Amount Receipt (in Lakhs)" class="form-control" value="{{ old('amount_receipt') }}">
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Interest on Released Fund (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="interest_on_released_fund" placeholder="Interest on Released Fund (in Lakhs)" class="form-control" value="{{ old('interest_on_released_fund') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <button type="submit" class="btn btn-primary btn-flat">Submit</button>
        </div>
    </form>

</div>

@endsection