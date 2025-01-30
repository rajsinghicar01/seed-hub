@extends('admin.layouts.admin-app')
@section('page_title','Seed Categories')

@section('main_headeing','Seed Categories')
@section('sub_headeing','Seed Category Details')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('categories.index') }}"><i
                class="fa fa-arrow-left"></i> Back </a>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Seed Category Name:</strong>
                {{ $category->name }}
            </div>
        </div>
    </div>
</div>

@endsection