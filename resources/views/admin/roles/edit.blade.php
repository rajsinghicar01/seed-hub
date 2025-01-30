@extends('admin.layouts.admin-app')
@section('page_title','Roles')

@section('main_headeing','Roles')
@section('sub_headeing','Edit Role')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('roles.index') }}"><i
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

    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:<span class="text-danger">*</span></strong>
                    <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $role->name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:<span class="text-danger">*</span></strong> &nbsp; &nbsp; &nbsp;
                    <label><input type="checkbox" id="select_all"> Check All</label><hr>
                    <ul id="limheight">
                        @foreach($permission as $value)
                        <li>
                            <label>
                                <input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}"
                                    class="name checkbox" {{ in_array($value->id, $rolePermissions) ? 'checked' : ''}}>
                                {{ $value->name }}
                            </label>
                        </li>
                        @endforeach
                    <ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
            </div>
        </div>
    </form>

</div>

@endsection

@section('additional_css')
<style>
#limheight {
    height: auto;
    -webkit-column-count: 5;
    -moz-column-count: 5;
    column-count: 5;
}
#limheight li {
    display: flex;
}
</style>
@endsection

@section('additional_js')
<script>
$(document).ready(function(){
    // Select all checkboxes
    $('#select_all').on('click', function(){
        let chk_status = this.checked;

        // Iterate all listed checkbox items
        $('.checkbox').each(function(){
            this.checked = chk_status;
        });
    });
    
    // Check or uncheck "select all", if one of the listed checkbox items is checked/unchecked
    $('.checkbox').on('click', function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked', true);
        }else{
            $('#select_all').prop('checked', false);
        }
    });

    if($('.checkbox').length==$('.checkbox:checked').length){
        $('#select_all').prop('checked', true);
    }else{
        $('#select_all').prop('checked', false);
    }
});
</script>
@endsection