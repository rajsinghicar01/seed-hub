@extends('admin.layouts.admin-app')
@section('page_title','Revolving Funds')

@section('main_headeing','Revolving Funds')
@section('sub_headeing','Revolving Fund Detail')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('revolving-funds.index') }}"><i
                class="fa fa-arrow-left"></i> Back </a>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered data-table table-striped" style="width:100%">
                    <tbody>
                        <tr>
                            <th width="30%">Centre Name</th>
                            <td width="70%">{{ $revolving_fund->centre->centre_name }}</td>
                        </tr>
                        <tr>
                            <th>Season</th>
                            <td>{{ $revolving_fund->season->name }}</td>
                        </tr>
                        <tr>
                            <th>Released Fund</th>
                            <td>{{ $revolving_fund->released_fund }}</td>
                        </tr>
                        <tr>
                            <th>Earning by Seed Sale etc</th>
                            <td>{{ $revolving_fund->earning_by_seed_sale_etc }}</td>
                        </tr>
                        <tr>
                            <th>Interest on Released Fund</th>
                            <td>{{ $revolving_fund->interest_on_released_fund }}</td>
                        </tr>
                        <tr>
                            <th>Total Earning Available</th>
                            <td>{{ $revolving_fund->total_earning_available }}</td>
                        </tr>
                        <tr>
                            <th>Opening Balance</th>
                            <td>{{ $revolving_fund->opening_balance }}</td>
                        </tr>
                        <tr>
                            <th>Infrastructure Fund</th>
                            <td>{{ $revolving_fund->infrastructure_fund }}</td>
                        </tr>
                        <tr>
                            <th>Utilized Infrastructure Fund</th>
                            <td>{{ $revolving_fund->utilized_infrastructure_fund }}</td>
                        </tr>
                        <tr>
                            <th>Available Infrastructure Fund</th>
                            <td>{{ $revolving_fund->available_infrastructure_fund }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection