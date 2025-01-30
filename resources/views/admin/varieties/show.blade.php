@extends('admin.layouts.admin-app')
@section('page_title','Varieties')

@section('main_headeing','Varieties')
@section('sub_headeing','Variety Details')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('varieties.index') }}"><i class="fa fa-arrow-left"></i> Back </a>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered data-table table-striped" style="width:100%">
                    <tbody>
                        <tr>
                            <th width="30%">Varieties Name</th>
                            <td width="70%">{{ $variety->variety_name }}</td>
                        </tr>
                        <tr>
                            <th>Year of Notification</th>
                            <td>{{ $variety->year_of_notification }}</td>
                        </tr>
                        <tr>
                            <th>Average Yield</th>
                            <td>{{ $variety->average_yield }}</td>
                        </tr>
                        <tr>
                            <th>Oil Content</th>
                            <td>{{ $variety->oil_content }}</td>
                        </tr>
                        <tr>
                            <th>Day of Maturity</th>
                            <td>{{ $variety->day_of_maturity }}</td>
                        </tr>
                        <tr>
                            <th>Release</th>
                            <td>{{ $variety->release }}</td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{ $variety->created_at->format('D, d M Y h:i A') }}</td>
                        </tr>
                        <tr>
                            <th>Created By</th>
                            <td>{{ $variety->user->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection