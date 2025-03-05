@extends('admin.layouts.admin-app')
@section('page_title', 'Reports')

@section('main_headeing', 'Seed Target Report')
@section('sub_headeing', 'Seed Target Report')

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
                            <form method="POST" action="{{ route('reports.index') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select name="centre_id" class="form-control">
                                            <option value="">Choose Center</option>
                                            @foreach($centres as $centre)
                                            <option value="{{ $centre->id }}" {{ request('centre_id') == $centre->id ? 'selected' : '' }} > {{ $centre->centre_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="season_id" class="form-control">
                                            <option value="">Choose Season</option>
                                            @foreach($seasons as $season)
                                            <option value="{{ $season->id }}" {{ request('season_id') == $season->id ? 'selected' : '' }}>{{ $season->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-search"></i> Filter</button>
                                        <a href="" class="btn btn-warning btn-flat"><i class="fa fa-reload"></i> Reset</a>
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
        @if(!empty($seed_targets->toArray()))
        <div id="printableArea">
            <div class="col-lg-12 col-12">
                <h4 class="text-center">ICAR-Directorate of Rapeseed-Mustard Reasearch, Sewer, Bharatpur (Rajasthan)</h4>
                <p><strong>Physical and Financial Progress of Eight Seed Hub centres:</strong></p>
                <h5 class="text-center mt-4">FORMAT FOR COLLECTING INFORMATION ON IMPLEMENTATION OF SEED HUB PROGRAMME OF OILSEED CROPS</h5>
                <h5 class="text-center mb-5"><u>1. PROGRESS ON SEED PRODUCTION</u></h5>
            </div>
            @php $previous = null; $letter = "A"; @endphp

                @foreach($seed_targets as $key => $seed_target)
                <div class="col-lg-12 col-12">
                    @if($seed_target->centre_id !== $previous)
                        
                        <p><strong>Name of the centre:</strong> {{ $seed_target->centre->centre_name }}</p>
                        <p><strong>Name of the officer in charge:</strong> {{ $seed_target->centre->user->name }}</p>
                        <p><strong>Email ID:</strong> {{ $seed_target->centre->user->email }}</p>
                        <p><strong>Mobile No:</strong> +91-{{ $seed_target->centre->user->phone }}</p>
                        <p><strong>Co-ordinator Seed & Farm:</strong> {{ $seed_target->centre->controllingAuthority->authority_name }} ({{ $seed_target->centre->controllingAuthority->responsive_person }})</p>
                        <p><strong>Email ID:</strong> {{ $seed_target->centre->controllingAuthority->email }}</p>
                        <p><strong>Mobile No:</strong> +91-{{ $seed_target->centre->controllingAuthority->phone_no }}</p>
                        
                        @php $previous = $seed_target->centre_id; @endphp
                    @endif
                    <p><strong>{{ $letter++ }}) {{ $seed_target->season->name }}-Final</strong></p>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SI.No.</th>
                                <th>Crop</th>
                                <th>Variety</th>
                                <th>Year of notification</th>
                                <th>Season (Kharif/Rabi/Summer)</th>
                                <th>Target (Qtl)</th>
                                <th>Achievement (Qtl)</th>
                                <th>Reason for shortfall</th>
                                <th>Seed Sold (Qtl)</th>
                                <th>Balance available (Qtl)</th>
                                <th>Suplus seeds needs to be distributed (Qtl)</th>
                                <th>Major constraints for distribution</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total_seed_quantity = 0;
                                $quantity_produced = 0;
                                $seed_sold = 0;
                                $seed_available_for_sale = 0;
                            @endphp

                            @foreach($seed_target->items as $key => $item)
                                @php
                                    $total_seed_quantity += $item->total_seed_quantity;
                                    if($item->status){
                                        $quantity_produced += $item->status->quantity_produced;
                                        $seed_sold += $item->status->seed_sold;
                                        $seed_available_for_sale += $item->status->seed_available_for_sale;
                                    }else{
                                        $quantity_produced += 0;
                                        $seed_sold += 0;
                                        $seed_available_for_sale += 0;
                                    }
                                @endphp
                                <!-- Product 1 -->
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    @if($key==0)
                                    
                                    <td rowspan="{{ count($seed_target->items) }}">{{ $seed_target->crop->name }}</td>
                                    @endif
                                    <td>{{ $item->variety->variety_name }}</td>
                                    <td>{{ $item->variety->year_of_notification }}</td>
                                    <td>Rabi</td>
                                    <td>{{ number_format($item->total_seed_quantity, 2, '.', ',') }}</td>
                                    <td>{{ ($item->status)? number_format($item->status->quantity_produced, 2, '.', ','):'-' }}</td>
                                    <td>{{ ($item->status)? $item->status->reason_for_shortfall:'-' }}</td>
                                    <td>{{ ($item->status)? number_format($item->status->seed_sold, 2, '.', ','):'-' }}</td>
                                    <td>{{ ($item->status)? number_format($item->status->seed_available_for_sale, 2, '.', ','):'-' }}</td>
                                    <td>{{ ($item->status)? number_format($item->status->surplus_seed, 2, '.', ','):'-' }}</td>
                                    <td>{{ ($item->status)? $item->status->major_constraints_for_distribution:'-' }}</td>
                                </tr>
                            @endforeach
                            <tr> 
                                <th colspan="5">Total</th>
                                <th>{{ number_format($total_seed_quantity, 2, '.', ',') }}</th>
                                <th>{{ number_format($quantity_produced, 2, '.', ',') }}</th>
                                <th></th>
                                <th>{{ number_format($seed_sold, 2, '.', ',') }}</th>
                                <th>{{ number_format($seed_available_for_sale, 2, '.', ',') }}</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tbody>
                    </table>
                        
                </div>
                @endforeach
        </div>
        @else
            <div class="col-lg-12 col-12"><p class="text-center text-danger">Not Data found. Please try again with different selection.</p></div>
        @endif
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