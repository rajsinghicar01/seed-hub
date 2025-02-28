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
                <h4 class="text-center">ICAR-Directorate of Rapeseed-Mustard Reasearch, Sewer, Bharatpur (Rajasthan)
                </h4>
                <h5 class="text-center mt-4">FORMAT FOR COLLECTING INFORMATION ON IMPLEMENTATION OF SEED HUB PROGRAMME
                    OF OILSEED CROPS</h5>
                <h5 class="text-center mb-5"><u>1. UTILIZATION OF REVOLVING FUND</u></h5>
            </div>

            <div class="col-lg-12 col-12">
                <p><strong>Name of the centre:</strong> ARS, Srigangangar, Rajasthan (SKRAU, Bikaner)</p>
                <p><strong>Name of the officer in charge with email id and mobile No:</strong> Tony Stark</p>
            </div>

            <div class="col-lg-12 col-12 mt-5">
                <p><strong>I) Revolving fund release status</strong></p>
                <table class="table table-bordered table-striped text-center">
                    <tbody>
                        <tr>
                            <th rowspan="2">Total Allocation (2018-19 to 2022-23)</th>
                            <th colspan="5">Release</th>
                        </tr>
                        <tr>
                            <td>2018-19</td>
                            <td>2019-20</td>
                            <td>2020-21</td>
                            <td>2021-22</td>
                            <td>2022-23</td>
                        </tr>
                        <tr>
                            <td>100</td>
                            <td>50.00 (Rs. 40.0 lakhs through e-mail dated 10-01-19 and Rs. 10.0 lakhs vide letter dated 26-03-19)</td>
                            <td>7.5 (Letter No. 6-94/E/2009 dated 03-01-2030)</td>
                            <td>7.5 (Letter No. 6-94/E/2009 dated 03-01-2030)</td>
                            <td>7.5 (Letter No. 6-94/E/2009 dated 03-01-2030)</td>
                            <td>7.5 (Letter No. 6-94/E/2009 dated 03-01-2030)</td>
                        </tr>
                    </tbody>
                </table>

                <p><strong>I) Revolving fund release status</strong></p>
                <table class="table table-bordered table-striped text-center">
                    <tbody>
                        <tr>
                            <th>SI. No.</th>
                            <th>Pening balance (Rs. in Lakhs) As on 1st April, 2022</th>
                            <th>Release during 2023(Rs. in Lakhs)</th>
                            <th>Expenditure during 2022-23</th>
                            <th>Seed Procurement</th>
                            <th>Seed Sold</th>
                            <th>Balance amount (Rs. in Lakhs)</th>
                        </tr>
                        <tr>
                            <td>100</td>
                            <td>50.00 (Rs. 40.0 lakhs through e-mail dated 10-01-19 and Rs. 10.0 lakhs vide letter dated 26-03-19)</td>
                            <td>7.5 (Letter No. 6-94/E/2009 dated 03-01-2030)</td>
                            <td>7.5 (Letter No. 6-94/E/2009 dated 03-01-2030)</td>
                            <td>7.5 (Letter No. 6-94/E/2009 dated 03-01-2030)</td>
                            <td>7.5 (Letter No. 6-94/E/2009 dated 03-01-2030)</td>
                            <td>7.5 (Letter No. 6-94/E/2009 dated 03-01-2030)</td>
                        </tr>
                    </tbody>
                </table>

            </div>

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