@extends('admin.layouts.admin-app')
@section('page_title','Varieties')

@section('main_headeing','Varieties')
@section('sub_headeing','Edit Variety')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('varieties.index') }}"><i
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

    <form method="POST" action="{{ route('varieties.update', $variety->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Crop Name:<span class="text-danger">*</span></strong>
                    <select name="crop_name" class="form-control">
                        <option value="">Choose Crop Name</option>
                        @if(!empty($crops))
                        @foreach($crops as $crop)
                        <option value="{{ $crop->id }}" {{ ($crop->id==$variety->crop_id)? 'selected':'' }}>{{ $crop->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Variety Name:<span class="text-danger">*</span></strong>
                    <input type="text" name="variety_name" placeholder="Variety name" class="form-control" value="{{ $variety->variety_name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Year of Notification:<span class="text-danger">*</span></strong>
                    <select name="year_of_notification" class="form-control">
                        <option value="">Choose Year of Notification</option>
                        @for ($year=2020; $year<=date('Y'); $year++) 
                        <option value="{{$year}}" {{ ($variety->year_of_notification==$year)? 'selected':'' }}>{{$year}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Average Yield:<span class="text-danger">*</span></strong>
                    <input type="text" name="average_yield" placeholder="Average Yield" class="form-control" value="{{ $variety->average_yield }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Oil Content:<span class="text-danger">*</span></strong>
                    <input type="text" name="oil_content" placeholder="Oil Content" class="form-control" value="{{ $variety->oil_content }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Day of Maturity:<span class="text-danger">*</span></strong>
                    <input type="text" name="day_of_maturity" placeholder="Day of Maturity" class="form-control" value="{{ $variety->day_of_maturity }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Release:<span class="text-danger">*</span></strong>
                    <select name="release" class="form-control">
                        <option value="">Select One</option>
                        <option value="CVRC" {{ ($variety->release=='CVRC')?'selected':'' }}>CVRC</option>
                        <option value="State" {{ ($variety->release=='State')?'selected':'' }}>State</option>
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