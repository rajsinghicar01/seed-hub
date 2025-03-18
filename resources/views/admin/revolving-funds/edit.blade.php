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

    <form method="POST" action="{{ route('revolving-funds.update', $revolving_fund->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h5 class="card-title m-0">Revolving Fund Status <small class="text-danger">(Fill up by Admin)</small></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Centre Name:<span class="text-danger">*</span></strong>
                                    <select name="centre_id" class="form-control {{ (isAdmin())?'':'user-seed-target' }}">
                                        <option value="">Choose centre name</option>
                                        @if(!empty($centres))
                                        @foreach($centres as $centre)
                                        <option value="{{ $centre->id }}" {{ ($centre->id==$revolving_fund->centre_id)?'selected':'' }}>{{ $centre->centre_name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Season Name:<span class="text-danger">*</span></strong>
                                    <select name="season_id" class="form-control {{ (isAdmin())?'':'user-seed-target' }}">
                                        <option value="">Choose season name</option>
                                        @if(!empty($seasons))
                                        @foreach($seasons as $season)
                                        <option value="{{ $season->id }}" {{ ($season->id==$revolving_fund->season_id)?'selected':'' }}>{{ $season->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Released Fund (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="released_fund" placeholder="Released Fund"
                                        class="form-control {{ (isAdmin())?'':'user-seed-target' }}" value="{{ $revolving_fund->released_fund }}">
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <div class="form-group">
                                    <strong>Description:<span class="text-danger">*</span></strong>
                                    <input type="text" name="description" placeholder="Enter description" class="form-control {{ (isAdmin())?'':'user-seed-target' }}" value="{{ $revolving_fund->description }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Opening Balance (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="opening_balance" id="opening_balance" placeholder="Enter opening balance" class="form-control user-seed-target" value="{{ $revolving_fund->opening_balance }}">
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
                                    <input type="text" name="infrastructure_fund" id="infrastructure_fund" placeholder="Infrastructure Fund (in Lakhs)" class="form-control {{ (isAdmin())?'':'user-seed-target' }}" value="{{ $revolving_fund->infrastructure_fund }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Utilized Infrastructure Fund (in Lakhs): <small class="text-danger">(Fill up by centre)</small></strong>
                                    <input type="text" name="utilized_infrastructure_fund" id="utilized_infrastructure_fund" placeholder="Utilized Infrastructure Fund (in Lakhs)" class="form-control" value="{{ $revolving_fund->utilized_infrastructure_fund }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Available Infrastructure Fund (in Lakhs): <small class="text-danger">(Fill up by centre)</small></strong>
                                    <input type="text" name="available_infrastructure_fund" id="available_infrastructure_fund" placeholder="Available Infrastructure Fund (in Lakhs)" class="form-control user-seed-target" value="{{ $revolving_fund->available_infrastructure_fund }}">
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
                                    <strong>Training Organized (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="training_organized" id="training_organized" class="form-control" placeholder="Training Organized (Rs)" value="{{ $revolving_fund->training_organized }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Field Day (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="field_day" id="field_day" class="form-control" placeholder="Field Day (Rs)" value="{{ $revolving_fund->field_day }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Procurement Seed Quantity (Qtl):<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_quantity" id="seed_quantity" placeholder="Seed Quantity" class="form-control" value="{{ $revolving_fund->seed_quantity }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Seed Procurement Rate (Rs/qtl):<span class="text-danger">*</span></strong>
                                    <input type="text" name="procurement_rate" id="procurement_rate" placeholder="Procurement Rate (Rs)" class="form-control" value="{{ $revolving_fund->procurement_rate }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Seed Procurement Amount (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="procurement_amount" id="procurement_amount" placeholder="Procurement Amount (Rs)" class="form-control" value="{{ $revolving_fund->procurement_amount }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Number of Growers Involved:<span class="text-danger">*</span></strong>
                                    <input type="text" name="number_of_growers_involved" id="number_of_growers_involved" placeholder="Seed Procurement (Rs)" class="form-control" value="{{ $revolving_fund->number_of_growers_involved }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Farm Operations (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="farm_operations" id="farm_operations" placeholder="Farm Operations (Rs)" class="form-control" value="{{ $revolving_fund->farm_operations }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Other Activities (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="other_activities" id="other_activities" placeholder="Other Activities (Rs)" class="form-control" value="{{ $revolving_fund->other_activities }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Total Expenditures (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="total_expenditures" id="total_expenditures" placeholder="Total Expenditures (Rs)" class="form-control user-seed-target" value="{{ $revolving_fund->total_expenditures }}">
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
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Seed Sold (Qtl):<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_sold" id="seed_sold" placeholder="Seed Sold (Qtl)" class="form-control" value="{{ $revolving_fund->seed_sold }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Rate (Rs/qtl):<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_sold_rate" id="seed_sold_rate" placeholder="Seed Sold Rate" class="form-control" value="{{ $revolving_fund->seed_sold_rate }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Amount Receipt (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="amount_receipt" id="amount_receipt" placeholder="Amount Receipt (in Lakhs)" class="form-control" value="{{ $revolving_fund->amount_receipt }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Interest on Released Fund (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="interest_on_released_fund" id="interest_on_released_fund" placeholder="Interest on Released Fund (in Lakhs)" class="form-control" value="{{ $revolving_fund->interest_on_released_fund }}">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Total Incomes (in Lakhs):<span class="text-danger">*</span></strong>
                                    <input type="text" name="total_incomes" id="total_incomes" placeholder="Total Incomes (in Lakhs)" class="form-control user-seed-target" value="{{ $revolving_fund->total_incomes }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <button type="submit" id="editButton" class="btn btn-primary btn-flat">Submit</button>
        </div>
    </form>
</div>
@endsection

@section('additional_css')
<style>
.user-seed-target {
    pointer-events: none;
}
</style>
@endsection

@section('additional_js')
<script>
// calculate procurement amount
$("#seed_quantity, #procurement_rate").keyup(function() {
    if($('#seed_quantity').val() == ''){ var seed_quantity = parseInt(0); }else{ var seed_quantity = parseInt($('#seed_quantity').val()); }
    if($('#procurement_rate').val() == ''){ var procurement_rate = parseInt(0); }else{ var procurement_rate = parseInt($('#procurement_rate').val()); }

    var procurement_amount = parseInt(seed_quantity*procurement_rate);
    $('#procurement_amount').val(procurement_amount);
});

// calculate total Expenditures
$("#training_organized, #field_day, #farm_operations, #other_activities, #seed_quantity, #procurement_rate").keyup(function() {
    
    if($('#training_organized').val() == ''){ var training_organized = parseInt(0); }else{ var training_organized = parseInt($('#training_organized').val()); }
    if($('#field_day').val() == ''){ var field_day = parseInt(0); }else{ var field_day = parseInt($('#field_day').val()); }
    if($('#farm_operations').val() == ''){ var farm_operations = parseInt(0); }else{ var farm_operations = parseInt($('#farm_operations').val()); }
    if($('#other_activities').val() == ''){ var other_activities = parseInt(0); }else{ var other_activities = parseInt($('#other_activities').val()); }
    if($('#procurement_amount').val() == ''){ var procurement_amount = parseInt(0); }else{ var procurement_amount = parseInt($('#procurement_amount').val()); }

    var total_expenditures = parseInt(training_organized+field_day+farm_operations+other_activities+procurement_amount);
    $('#total_expenditures').val(total_expenditures);
});


// calculate procurement amount
$("#seed_sold, #seed_sold_rate").keyup(function() {
    if($('#seed_sold').val() == ''){ var seed_sold = parseInt(0); }else{ var seed_sold = parseInt($('#seed_sold').val()); }
    if($('#seed_sold_rate').val() == ''){ var seed_sold_rate = parseInt(0); }else{ var seed_sold_rate = parseInt($('#seed_sold_rate').val()); }

    var amount_receipt = parseInt(seed_sold*seed_sold_rate);
    $('#amount_receipt').val(amount_receipt);
});

// calculate total Incomes
$("#seed_sold, #seed_sold_rate, #amount_receipt, #interest_on_released_fund").keyup(function() {
    
    if($('#seed_sold').val() == ''){ var seed_sold = parseInt(0); }else{ var seed_sold = parseInt($('#seed_sold').val()); }
    if($('#seed_sold_rate').val() == ''){ var seed_sold_rate = parseInt(0); }else{ var seed_sold_rate = parseInt($('#seed_sold_rate').val()); }
    if($('#amount_receipt').val() == ''){ var amount_receipt = parseInt(0); }else{ var amount_receipt = parseInt($('#amount_receipt').val()); }
    if($('#interest_on_released_fund').val() == ''){ var interest_on_released_fund = parseInt(0); }else{ var interest_on_released_fund = parseInt($('#interest_on_released_fund').val()); }

    var total_incomes = parseInt(amount_receipt+interest_on_released_fund);
    $('#total_incomes').val(total_incomes);
});

$("#utilized_infrastructure_fund").keyup(function() {
    var infrastructure_fund = parseInt($('#infrastructure_fund').val());
    var utilized_infrastructure_fund = parseInt($('#utilized_infrastructure_fund').val());

    if(infrastructure_fund >= utilized_infrastructure_fund){
        var available_infrastructure_fund = parseInt(infrastructure_fund - utilized_infrastructure_fund);
        $('#available_infrastructure_fund').val(available_infrastructure_fund);
    }else{
        $('#utilized_infrastructure_fund').val(0);
        $('#available_infrastructure_fund').val(0);
    }
});

</script>
@endsection