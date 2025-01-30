@extends('admin.layouts.admin-app')
@section('page_title','Seed Targets')

@section('main_headeing','Seed Targets')
@section('sub_headeing','Create New Seed Target')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('seed-targets.index') }}"><i
                class="fa fa-arrow-left"></i> Back </a>
    </div>
</div>
<div class="card-body">

    <!-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Something went wrong.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->

    @session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
    @endsession

    <form method="POST" action="{{ route('seed-targets.store') }}">
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <strong>Centre Name:<span class="text-danger">*</span></strong>
                    <select name="centre_id" class="form-control">
                        <option value="">Choose Centre Name</option>
                        @if(!empty($centres))
                        @foreach($centres as $centre)
                        <option value="{{ $centre->id }}" {{ (request()->old('centre_id') == $centre->id)?'selected':'' }}>{{ $centre->centre_name }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('centre_id')<p class="text-danger">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <strong>Crop Season:<span class="text-danger">*</span></strong>
                    <select name="season_id" class="form-control">
                        <option value="">Choose Crop Season</option>
                        @if(!empty($seasons))
                        @foreach($seasons as $season)
                        <option value="{{ $season->id }}" {{ (request()->old('season_id') == $season->id)?'selected':'' }}>{{ $season->name }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('season_id')<p class="text-danger">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <strong>Crop Name:<span class="text-danger">*</span></strong>
                    <select name="crop_id" class="form-control crop_id" onchange="jsFunction(this.value);">
                        <option value="">Choose Crop Name</option>
                        @if(!empty($crops))
                        @foreach($crops as $crop)
                        <option value="{{ $crop->id }}" {{ (request()->old('crop_id') == $crop->id)?'selected':'' }}>{{ $crop->name }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('crop_id')<p class="text-danger">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <table class="table table-bordered mt-2 table-add-more">
                <thead>
                    <tr>
                        <th colspan="3">Seed Target Items</th>
                        <th><button class="btn btn-outline-primary btn-sm btn-add-more"><i class="fa fa-plus"></i> Add More</button></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $key = 0;
                    @endphp
                    @if(request()->old('items'))
                    @foreach(request()->old('items') as $key => $item)
                    <tr>
                        <td>
                            <strong>Variety Name:<span class="text-danger">*</span></strong>
                            <select name="items[{{$key}}][variety_id]" id="variety_id_{{$key}}" class="form-control variety_id">
                                <option value="">Choose Crop Name First</option>        
                            </select>
                            @error("items.{$key}.variety_id")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </td>
                        <td>
                            <strong>Seed Category:<span class="text-danger">*</span></strong>
                            <select name="items[{{$key}}][category_id]" class="form-control">
                                <option value="">Choose Seed Category</option>
                                @if(!empty($categories))
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ($item['category_id']  == $category->id)?'selected':'' }}>{{ $category->name }}</option>
                                @endforeach
                                @endif
                            </select>
                            @error("items.{$key}.category_id")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </td>
                        <td>
                            <strong>Total Seed Quantity (Kg):<span class="text-danger">*</span></strong>
                            <input type="text" name="items[{{$key}}][total_seed_quantity]" class="form-control" placeholder="Total Seed Quantity" value="{{ $item['total_seed_quantity'] ?? '' }}">
                            @error("items.{$key}.total_seed_quantity")
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </td>
                        <td><button class="btn btn-outline-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i></button></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>
                            <strong>Variety Name:<span class="text-danger">*</span></strong>
                            <select name="items[0][variety_id]" id="variety_id_0" class="form-control variety_id">
                                <option value="">Choose Crop Name First</option>        
                            </select>
                        </td>
                        <td>
                            <strong>Seed Category:<span class="text-danger">*</span></strong>
                            <select name="items[0][category_id]" class="form-control">
                                <option value="">Choose Seed Category</option>
                                @if(!empty($categories))
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </td>
                        <td>
                            <strong>Total Seed Quantity (Kg):<span class="text-danger">*</span></strong>
                            <input type="text" name="items[0][total_seed_quantity]" class="form-control" placeholder="Total Seed Quantity">
                        </td>
                        <td><button class="btn btn-outline-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i></button></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary btn-flat">Submit</button>
        </div>
    </form>

</div>

@endsection

@section('additional_js')
<script>
function jsFunction(crop_value) {
    var crop_value = crop_value;
    $(".variety_id").html('');
    $.ajax({
        url: "{{ route('get_varieties_by_crop') }}",
        type: "POST",
        data: {
            crop_value: crop_value,
            _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(result) {
            $(".variety_id").html('<option value="">Select Variety</option>');
            $.each(result.varieties, function(key, value) {
                $(".variety_id").append('<option value="' + value.id + '">' + value
                    .variety_name + '</option>');
            });
            console.log(result);
        }
    });
}


function get_selected_varieties_by_crop(variety_id) {
    var crop_value = $(".crop_id").val();
    $("#"+variety_id).html('');
    $.ajax({
        url: "{{ route('get_varieties_by_crop') }}",
        type: "POST",
        data: {
            crop_value: crop_value,
            _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(result) {
            $("#"+variety_id).html('<option value="">Select Variety</option>');
            $.each(result.varieties, function(key, value) {
                $("#"+variety_id).append('<option value="' + value.id + '">' + value
                    .variety_name + '</option>');
            });
        }
    });
}

$(document).ready(function() {
    i = "{{$key}}";
    $(".btn-add-more").click(function(e) {
        e.preventDefault();
        i++;
        get_selected_varieties_by_crop('variety_id_'+i);
        $(".table-add-more tbody").append('<tr> <td> <strong>Variety Name:<span class="text-danger">*</span></strong> <select name="items[' + i + '][variety_id]" id="variety_id_' + i + '" class="form-control variety_id"> <option value="">Choose Crop Name First</option> </select> </td> <td> <strong>Seed Category:<span class="text-danger">*</span></strong> <select name="items[' + i + '][category_id]" class="form-control"> <option value="">Choose Seed Category</option> @if(!empty($categories)) @foreach($categories as $category) <option value="{{ $category->id }}">{{ $category->name }}</option> @endforeach @endif </select> </td> <td> <strong>Total Seed Quantity (Kg):<span class="text-danger">*</span></strong> <input type="text" name="items[' + i + '][total_seed_quantity]" class="form-control" placeholder="Total Seed Quantity"> </td> <td><button class="btn btn-outline-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i></button></td> </tr>'
        );
    });
    $(document).on('click', '.btn-add-more-rm', function() {
        $(this).parents("tr").remove();
    });
});
</script>
@endsection