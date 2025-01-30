@extends('admin.layouts.admin-app')
@section('page_title','Seed Targets')

@section('main_headeing','Seed Targets')
@section('sub_headeing','Create New Seed Target')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
    <div class="float-right">
        <a class="btn btn-outline-primary btn-block btn-sm" href="{{ route('seed-targets.index') }}"><i class="fa fa-arrow-left"></i> Back </a>
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

    <div class="alert alert-success" id="msg" style="display:none;">
        <strong>Success!</strong> Seed target item deleted successfully.
    </div>

    <form method="POST" action="{{ route('seed-targets.update', $seed_target->id) }}">
        @csrf
        @method('PUT')
        <div class="row {{ (isAdmin())?'admin':'user-seed-target' }}">
            <div class="col-sm-4">
                <div class="form-group">
                    <strong>Centre Name:<span class="text-danger">*</span></strong>
                    <select name="centre_id" class="form-control">
                        <option value="">Choose Centre Name</option>
                        @if(!empty($centres))
                        @foreach($centres as $centre)
                        <option value="{{ $centre->id }}" {{ ($seed_target->centre_id == $centre->id)?'selected':'' }}>
                            {{ $centre->centre_name }}</option>
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
                        <option value="{{ $season->id }}" {{ ($seed_target->season_id == $season->id)?'selected':'' }}>{{ $season->name }}</option>
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
                        <option value="{{ $crop->id }}" {{ ($seed_target->crop_id == $crop->id)?'selected':'' }}>{{ $crop->name }}</option>
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
                    @if(!empty($seed_target))
                        @foreach($seed_target->items as $key => $item)

                    @php
                        $cls = '';
                        if(isAdmin()){
                            $cls = 'admin';
                        }else{
                            if(Auth::user()->id!=$item['created_by'] ){
                                $cls = 'user-seed-target';
                            }
                        }
                    @endphp
                    <tr>
                        <td class="{{ $cls }}">
                            <input type="hidden" name="items[{{$key}}][id]" value="{{ $item->id }}">
                            <strong>Variety Name:<span class="text-danger">*</span></strong>
                            <select name="items[{{$key}}][variety_id]" id="variety_id_{{$key}}" class="form-control variety_id">
                                <option value="">Choose Crop Name First</option>
                                @if(!empty($selected_varieties))
                                @foreach($selected_varieties as $selected_variety)
                                <option value="{{ $selected_variety->id }}" {{ ($item->variety_id == $selected_variety->id)?'selected':'' }}>{{ $selected_variety->variety_name }}</option>
                                @endforeach
                                @endif
                            </select>
                            @error("items.{$key}.variety_id")<p class="text-danger">{{ $message }}</p>@enderror
                        </td>
                        <td class="{{ $cls }}">
                            <strong>Seed Category:<span class="text-danger">*</span></strong>
                            <select name="items[{{$key}}][category_id]" class="form-control">
                                <option value="">Choose Seed Category</option>
                                @if(!empty($categories))
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ($item->category->id  == $category->id)?'selected':'' }}>{{ $category->name }}</option>
                                @endforeach
                                @endif
                            </select>
                            @error("items.{$key}.category_id")<p class="text-danger">{{ $message }}</p>@enderror
                        </td>
                        <td class="{{ $cls }}">
                            <strong>Total Seed Quantity (Quintals):<span class="text-danger">*</span></strong>
                            <input type="text" name="items[{{$key}}][total_seed_quantity]" class="form-control" placeholder="Total Seed Quantity" value="{{ $item['total_seed_quantity'] ?? '' }}">
                            @error("items.{$key}.total_seed_quantity")<p class="text-danger">{{ $message }}</p>@enderror
                            <input type="hidden" name="items[{{$key}}][created_by]" value="{{ $item['created_by'] ?? '' }}">
                        </td>
                        <td>
                            @if(isAdmin())
                                <button class="btn btn-outline-danger btn-sm btn-add-more-rm" onclick="deleteItem({{ $item->id }})"><i class="fa fa-trash"></i></button>
                                @if(!empty($item->status))
                                    <button class="btn btn-outline-primary btn-sm" type="button" data-toggle="modal" data-target="#modal-view" title="View Seed Production Status" onclick="display_status_admin({{ $item->status->id }})"><i class="fa fa-file"></i></button>
                                @endif
                            @else
                                @if(Auth::user()->id==$item['created_by'] )
                                    <button class="btn btn-outline-danger btn-sm btn-add-more-rm" onclick="deleteItem({{ $item->id }})"><i class="fa fa-trash"></i></button>
                                @endif

                                @if(empty($item->status))
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-create" title="Create Seed Production Status" onclick="get_item_info({{ $item->id }})"><i class="fa fa-envelope"></i></button>
                                @else
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-edit" title="Update Seed Production Status" onclick="display_status({{ $item->status->id }})"><i class="fa fa-edit"></i></button> 
                                @endif

                            @endif
                            <br><br>
                            <p class="badge badge-warning">{{ (get_user_role_by_id($item['created_by']) =='user')?'Generated By Centre':'' }}</p>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>
                            <input type="text" name="items[0][id]" value="">
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
                            <strong>Total Seed Quantity (Quintals):<span class="text-danger">*</span></strong>
                            <input type="text" name="items[0][total_seed_quantity]" class="form-control" placeholder="Total Seed Quantity">
                            <input type="hidden" name="items[0][created_by]" value="{{ Auth::user()->id }}">
                        </td>
                        <td><button class="btn btn-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i></button></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary btn-flat">Submit</button>
        </div>
    </form>

    <!-- Create seed production status -->
    <div class="modal fade" id="modal-create" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title">Seed Production Status</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="responseMessage"></div>
                    <form id="insertForm">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Quantity Produced: (Quintals)<span class="text-danger">*</span></strong>
                                    <input type="text" name="quantity_produced" id="quantity_produced" class="form-control">
                                    <p id="quantity_produced_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Seed Available for Sale: (Quintals)<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_available_for_sale" id="seed_available_for_sale" class="form-control">
                                    <p id="seed_available_for_sale_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Seed Price:<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_price" id="seed_price" class="form-control">
                                    <p id="seed_price_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Reserved Seed: (Quintals)<span class="text-danger">*</span></strong>
                                    <input type="text" name="reserved_seed" id="reserved_seed" class="form-control">
                                    <input type="hidden" name="seed_target_item_id" id="seed_target_item_id" class="form-control">
                                    <p id="reserved_seed_error" class="text-danger"></p>
                                    <p id="seed_target_item_id_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Create seed production status -->
    <div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title">Update Seed Production Status</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="responseMessageEdit"></div>
                    <form id="editForm">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Quantity Produced: (Quintals)<span class="text-danger">*</span></strong>
                                    <input type="text" name="quantity_produced_edit" id="quantity_produced_edit" class="form-control">
                                    <p id="quantity_produced_edit_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Seed Available for Sale: (Quintals)<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_available_for_sale_edit" id="seed_available_for_sale_edit" class="form-control">
                                    <p id="seed_available_for_sale_edit_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Seed Price:<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_price_edit" id="seed_price_edit" class="form-control">
                                    <p id="seed_price_edit_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Reserved Seed: (Quintals)<span class="text-danger">*</span></strong>
                                    <input type="text" name="reserved_seed_edit" id="reserved_seed_edit" class="form-control">
                                    <input type="hidden" name="seed_target_item_id_edit" id="seed_target_item_id_edit" class="form-control">
                                    <input type="hidden" name="seed_target_item_status_id_edit" id="seed_target_item_status_id_edit" class="form-control">
                                    <p id="reserved_seed_edit_error" class="text-danger"></p>
                                    <p id="seed_target_item_id_edit_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- Create seed production status -->
    <div class="modal fade" id="modal-view" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title">View Seed Production Status</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">          
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th width="40%">Quantity Produced</th>
                                    <td width="60%"><span id="view_quantity_produced"></span> (Quintals)</td>
                                </tr>
                                <tr>
                                    <th>Seed vailable for sale</th>
                                    <td><span id="view_seed_available_for_sale"></span> (Quintals)</td>
                                </tr>
                                <tr>
                                    <th>Seed price</th>
                                    <td><span id="view_seed_price"></span></td>
                                </tr>
                                <tr>
                                    <th>Reserved seed</th>
                                    <td><span id="view_reserved_seed"></span> (Quintals)</td>
                                </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('additional_js')
<script>

function display_status(status_id){
    var status_id = status_id;
    $.ajax({
        url: "{{ route('get_seed_production_statuses') }}",
        type: "POST",
        data: {
            status_id: status_id,
            _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(result) {
            $('#quantity_produced_edit').val(result.data[0].quantity_produced);
            $('#seed_available_for_sale_edit').val(result.data[0].seed_available_for_sale);
            $('#seed_price_edit').val(result.data[0].seed_price);
            $('#reserved_seed_edit').val(result.data[0].reserved_seed);
            $('#seed_target_item_id_edit').val(result.data[0].seed_target_item_id);
            $('#seed_target_item_status_id_edit').val(result.data[0].id);
        }
    });
}

function display_status_admin(status_id){
    var status_id = status_id;
    $.ajax({
        url: "{{ route('get_seed_production_statuses') }}",
        type: "POST",
        data: {
            status_id: status_id,
            _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(result) {
            $('#view_quantity_produced').html(result.data[0].quantity_produced);
            $('#view_seed_available_for_sale').html(result.data[0].seed_available_for_sale);
            $('#view_seed_price').html(result.data[0].seed_price);
            $('#view_reserved_seed').html(result.data[0].reserved_seed);
            $('#view_seed_target_item_id').html(result.data[0].seed_target_item_id);
            $('#view_seed_target_item_status_id').html(result.data[0].id);
        }
    });
}

$(document).ready(function() {
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        $('#quantity_produced_edit_error').text('');
        $('#seed_available_for_sale_edit_error').text('');
        $('#seed_price_edit_error').text('');
        $('#reserved_seed_edit_error').text('');
        $('#seed_target_item_id_edit_error').text('');
        $('#responseMessageEdit').html('');
        var status_id = $('#seed_target_item_id_edit').val();
    
        $.ajax({
            url: "{{ route('status_update') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $('#responseMessageEdit').html('<p style="color: green;">' + response.message +'</p>');
                // $('#editForm')[0].reset();
            },
            error: function(xhr) {
                if (xhr.status === 400) {
                    let errors = xhr.responseJSON.message;
                    if (errors.quantity_produced_edit) {
                        $('#quantity_produced_edit_error').text(errors.quantity_produced_edit);
                    }
                    if (errors.seed_available_for_sale_edit) {
                        $('#seed_available_for_sale_edit_error').text(errors.seed_available_for_sale_edit);
                    }
                    if (errors.seed_price_edit) {
                        $('#seed_price_edit_error').text(errors.seed_price_edit);
                    }
                    if (errors.reserved_seed_edit) {
                        $('#reserved_seed_edit_error').text(errors.reserved_seed_edit);
                    }
                    if (errors.seed_target_item_id_edit) {
                        $('#seed_target_item_id_edit_error').text(errors.seed_target_item_id_edit);
                    }
                }
            }
        });
    });
});

function get_item_info(item_id) {
    var item_id = item_id;
    $('#seed_target_item_id').val(item_id);

    $('#quantity_produced_error').text('');
    $('#seed_available_for_sale_error').text('');
    $('#seed_price_error').text('');
    $('#reserved_seed_error').text('');
    $('#seed_target_item_id_error').text('');
    $('#responseMessage').html('');
    $('#insertForm')[0].reset();
}

$("#seed_available_for_sale").keyup(function() {
    var quantity_produced = $('#quantity_produced').val();
    var seed_available_for_sale = $('#seed_available_for_sale').val();
    var reserved_seed = quantity_produced - seed_available_for_sale;
    $('#reserved_seed').val(reserved_seed);
});

$(document).ready(function() {
    $('#insertForm').on('submit', function(e) {
        e.preventDefault();
        $('#quantity_produced_error').text('');
        $('#seed_available_for_sale_error').text('');
        $('#seed_price_error').text('');
        $('#reserved_seed_error').text('');
        $('#seed_target_item_id_error').text('');
        $('#responseMessage').html('');
        
        $.ajax({
            url: "{{ route('seed-production-statuses.store') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $('#responseMessage').html('<p style="color: green;">' + response.message +'</p>');
                $('#insertForm')[0].reset();
            },
            error: function(xhr) {
                if (xhr.status === 400) {
                    let errors = xhr.responseJSON.message;
                    if (errors.quantity_produced) {
                        $('#quantity_produced_error').text(errors.quantity_produced);
                    }
                    if (errors.seed_available_for_sale) {
                        $('#seed_available_for_sale_error').text(errors.seed_available_for_sale);
                    }
                    if (errors.seed_price) {
                        $('#seed_price_error').text(errors.seed_price);
                    }
                    if (errors.reserved_seed) {
                        $('#reserved_seed_error').text(errors.reserved_seed);
                    }
                    if (errors.seed_target_item_id) {
                        $('#seed_target_item_id_error').text(errors.seed_target_item_id);
                    }
                }
            }
        });
    });
});

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
                $(".variety_id").append('<option value="' + value.id + '">' + value.variety_name + '</option>');
            });
        }
    });
}

function get_selected_varieties_by_crop(variety_id) {
    var crop_value = $(".crop_id").val();
    $("#" + variety_id).html('');
    $.ajax({
        url: "{{ route('get_varieties_by_crop') }}",
        type: "POST",
        data: {
            crop_value: crop_value,
            _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(result) {
            $("#" + variety_id).html('<option value="">Select Variety</option>');
            $.each(result.varieties, function(key, value) {
                $("#" + variety_id).append('<option value="' + value.id + '">' + value.variety_name + '</option>');
            });
        }
    });
}

$(document).ready(function() {
    i = "{{$key}}";
    $(".btn-add-more").click(function(e) {
        e.preventDefault();
        i++;
        get_selected_varieties_by_crop('variety_id_' + i);
        $(".table-add-more tbody").append('<tr> <td><input type="hidden" name="items['+i+'][id]" value=""> <strong>Variety Name:<span class="text-danger">*</span></strong> <select name="items['+i +'][variety_id]" id="variety_id_'+i+'" class="form-control variety_id"> <option value="">Choose Crop Name First</option> </select> </td> <td> <strong>Seed Category:<span class="text-danger">*</span></strong> <select name="items['+i+'][category_id]" class="form-control"> <option value="">Choose Seed Category</option> @if(!empty($categories)) @foreach($categories as $category) <option value="{{ $category->id }}">{{ $category->name }}</option> @endforeach @endif </select> </td> <td> <strong>Total Seed Quantity (Quintals):<span class="text-danger">*</span></strong> <input type="text" name="items['+i+'][total_seed_quantity]" class="form-control" placeholder="Total Seed Quantity"> <input type="hidden" name="items['+i+'][created_by]" value="{{ Auth::user()->id }}"></td> <td><button class="btn btn-outline-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i></button></td> </tr>');
    });
    $(document).on('click', '.btn-add-more-rm', function() {
        $(this).parents("tr").remove();
    });
});

function deleteItem(item_id) {
    var item_id = item_id;
    $.ajax({
        url: "{{ route('delete_seed_target_items') }}",
        type: "POST",
        data: {
            item_id: item_id,
            _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(result) {
            $('#msg').show();
        }
    });
}
</script>
@endsection

@section('additional_css')
<style>
.user-seed-target {
    pointer-events: none;
}
</style>
@endsection