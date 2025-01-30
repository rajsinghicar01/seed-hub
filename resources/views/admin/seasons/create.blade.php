@extends('admin.layouts.admin-app')
@section('page_title','Cropping seasons')

@section('main_headeing','Cropping seasons')
@section('sub_headeing','Create New Cropping season')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('seasons.index') }}"><i
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

    <form method="POST" action="{{ route('seasons.store') }}">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cropping season Name:<span class="text-danger">*</span></strong>
                    <select name="name" class="form-control">
                        <option value="">Select a seasion</option>
                        @for($i=2020; $i<=2030; $i++)
                        <option value="{{$i}}-{{$i+1}}">{{$i}}-{{$i+1}}</option>
                        @endfor
                    <select>
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
            </div>
        </div>
    </form>

</div>

@endsection