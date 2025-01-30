@extends('admin.layouts.admin-app')
@section('page_title','Zones')

@section('main_headeing','Zones')
@section('sub_headeing','Zone Details')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('zones.index') }}"><i
                class="fa fa-arrow-left"></i> Back </a>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Zone Name:</strong>
                {{ $zone->zone_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Zone Name:</strong>
                @if(!empty($zone->states))
                    @foreach($zone->states as $state)
                        <label class="badge bg-primary">{{$state->state_name}}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection