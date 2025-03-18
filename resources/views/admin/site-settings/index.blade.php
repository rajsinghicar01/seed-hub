@extends('admin.layouts.admin-app')
@section('page_title','Site Settings')

@section('main_headeing','Site Settings')
@section('sub_headeing','Manage Site Settings')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
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

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success! </strong> {{ $message }}
    </div>
    @endif

    <form method="POST" action="{{ route('settings.update') }}">
        @csrf
        @foreach ($settings as $setting)
        <div class="mb-3">
            <label class="form-label">{{ ucfirst(str_replace('_', ' ', $setting->key)) }}</label>
            <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}" class="form-control">
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary btn-flat">Save Settings</button>
    </form>


</div>

@endsection