@extends('admin.layouts.admin-app')
@section('page_title','Cropping seasons')

@section('main_headeing','Cropping seasons')
@section('sub_headeing','Edit Cropping season')

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
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Whoops!</strong> Something went wrong.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form method="POST" action="{{ route('seasons.update', $season->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cropping season Name<span class="text-danger">*</span></strong>
                    <select name="name" class="form-control">
                        <option value="">Select a seasion</option>
                        @for($i=2020; $i<=2030; $i++)
                        <option value="{{$i}}-{{$i+1}}" {{ $season->name == $i.'-'.$i+1 ? 'selected' : '' }}>{{$i}}-{{$i+1}}</option>
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