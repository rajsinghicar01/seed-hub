@extends('admin.layouts.admin-app')
@section('page_title', 'Reports')

@section('main_headeing', 'Revolving Fund Report')
@section('sub_headeing', 'Revolving Fund Report')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="javascript:void(0);"
            onclick="printPageArea('printableArea')"><i class="fa fa-print"></i> Print </a>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card card-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-6">
                            <form method="POST" action="{{ route('reports.revolving_fund_reports') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select name="centre_id" class="form-control">
                                            <option value="">Choose Center</option>
                                            @foreach($centres as $centre)
                                            <option value="{{ $centre->id }}"
                                                {{ request('centre_id') == $centre->id ? 'selected' : '' }}>
                                                {{ $centre->centre_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="season_id" class="form-control">
                                            <option value="">Choose Season</option>
                                            @foreach($seasons as $season)
                                            <option value="{{ $season->id }}"
                                                {{ request('season_id') == $season->id ? 'selected' : '' }}>
                                                {{ $season->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary btn-flat"><i
                                                class="fas fa-search"></i> Filter</button>
                                        <a href="" class="btn btn-warning btn-flat"><i class="fa fa-reload"></i>
                                            Reset</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="printableArea" style="width:100%">
            
            <div class="col-lg-12 col-12">
                <h4 class="text-center">ICAR-Directorate of Rapeseed-Mustard Reasearch, Sewer, Bharatpur (Rajasthan)</h4>
                <h5 class="text-center mt-4">FORMAT FOR COLLECTING INFORMATION ON IMPLEMENTATION OF SEED HUB PROGRAMME OF OILSEED CROPS</h5>
                <h5 class="text-center mb-5"><u>1. UTILIZATION OF REVOLVING FUND</u></h5>
            </div>
            @if(!empty($allocations->toArray()))
                @foreach($allocations as $allocation)
                <div class="col-lg-12 col-12">
                    <p><strong>Name of the centre:</strong> {{ $allocation->centre->centre_name }}</p>
                    <p><strong>Name of the officer in charge with email id and mobile No:</strong> {{ $allocation->centre->user->name }}, {{ $allocation->centre->user->email }}, +91-{{ $allocation->centre->user->phone }}</p>
                </div>

                @php 
                    $funds = \App\Models\RevolvingFund::where(['centre_id' => $allocation->centre_id])->get(); 
                @endphp

                <div class="col-lg-12 col-12 mt-5">
                    <p><strong>I) Revolving fund release status</strong></p>
                    <table class="table table-bordered table-striped text-center">
                        <tbody>
                            <tr>
                                <th rowspan="2">Total Allocation (2020-21 to {{ date('Y')-1 }} - {{ date('y') }})</th>
                                <th colspan="{{ $funds->count()+1 }}">Release</th>
                            </tr>
                            
                            <tr>
                                @foreach($funds as $fund)
                                <td>{{ $fund->season->name}}</td>
                                @endforeach
                                <td>Total</td>
                            </tr>
                            <tr>
                                <td>{{ \App\Models\RevolvingFund::where(['centre_id' => $allocation->centre_id])->sum('released_fund') }}</td>
                                @foreach($funds as $fund)
                                <td>
                                    {{ $fund->released_fund}}
                                    <p>{{ $fund->description}}</p>
                                </td>
                                @endforeach
                                <td>{{ \App\Models\RevolvingFund::where(['centre_id' => $allocation->centre_id])->sum('released_fund') }}</td>
                            </tr>
                            
                        </tbody>
                    </table>


                    <p><strong>II) Revolving fund status during</strong></p>
                    @php $letter = "A"; @endphp
                    @foreach($funds as $fund)
                        <p><strong>{{ $letter++ }}){{ $fund->season->name}}-Final </strong></p>
                        <table class="table table-bordered table-striped text-center">
                            <tbody>
                                <tr>
                                    <th>SI. No.</th>
                                    <th>Opening balance (Rs. in Lakhs) As on 1st April, 2022</th>
                                    <th>Release during 2023 (Rs. in Lakhs)</th>

                                    <th colspan="9">Expenditure during 2022-23</th>

                                    <th colspan="5">Incomes</th>

                                    <th>Balance amount (Rs. in Lakhs)</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td>Training Organized (in Lakhs)</td>
                                    <td>Field Day (in Lakhs)</td>
                                    <td>Procurement Seed Quantity (Qtl)</td>
                                    <td>Procurement Rate (Rs/qtl)</td>
                                    <td>Seed Procurement Amount (in Lakhs)</td>
                                    <td>Number of Growers Involved</td>
                                    <td>Farm Operations (in Lakhs)</td>
                                    <td>Other Activities (in Lakhs)</td>
                                    <td>Total Expenditures (in Lakhs)</td>

                                    <td>Seed Sold (Qtl)</td>
                                    <td>Rate (Rs/qtl)</td>
                                    <td>Amount Receipt (in Lakhs)</td>
                                    <td>Interest on Released Fund (in Lakhs)</td>
                                    <td>Total Incomes (in Lakhs)</td>

                                    <td></td>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>{{ $fund->opening_balance }}</td>
                                    <td>{{ $fund->released_fund }}</td>

                                    <td>{{ $fund->training_organized }}</td>
                                    <td>{{ $fund->field_day }}</td>
                                    <td>{{ $fund->seed_quantity }}</td>
                                    <td>{{ $fund->procurement_rate }}</td>
                                    <td>{{ $fund->procurement_amount }}</td>
                                    <td>{{ $fund->number_of_growers_involved }}</td>
                                    <td>{{ $fund->farm_operations }}</td>
                                    <td>{{ $fund->other_activities }}</td>
                                    <td>{{ $fund->total_expenditures }}</td>

                                    <td>{{ $fund->seed_sold }}</td>
                                    <td>{{ $fund->seed_sold_rate }}</td>
                                    <td>{{ $fund->amount_receipt }}</td>
                                    <td>{{ $fund->interest_on_released_fund }}</td>
                                    <td>{{ $fund->total_incomes }}</td>

                                    <td>Need to calculate</td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
                <hr>
                <hr>
                @endforeach
            @else
                <div class="col-lg-12 col-12"><p class="text-center text-danger">Not Data found. Please try again with different selection.</p></div>
            @endif
        </div>
    </div>
</div>

@endsection


@section('additional_js')
<script>
function printPageArea(areaID) {
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>
@endsection


@section('additional_css')
<style>
div#printableArea p {
    margin-bottom: 1px !important;
}
</style>
@endsection