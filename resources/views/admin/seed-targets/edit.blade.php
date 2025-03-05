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

                            <input type="hidden" name="items[{{$key}}][seed_target_id]" value="{{ $seed_target->id }}">
                            @error("items.{$key}.seed_target_id")<p class="text-danger">{{ $message }}</p>@enderror
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
                            <strong>Total Seed Quantity (Qtl):<span class="text-danger">*</span></strong>
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
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-create" title="Create Seed Production Status"  onclick="get_item_info({{ $item->id }},{{ $item['total_seed_quantity'] ?? '' }})"><i class="fa fa-envelope"></i></button>
                                @else
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-edit" title="Update Seed Production Status" onclick="display_status({{ $item->status->id }},{{ $item['total_seed_quantity'] ?? '' }})"><i class="fa fa-edit"></i></button> 
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

                            <input type="text" name="items[0][seed_target_id]" value="{{ $seed_target->id }}">
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
                            <strong>Total Seed Quantity (Qtl):<span class="text-danger">*</span></strong>
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
                    <h3 class="card-title">Create Seed Production Status</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="responseMessage" class="text-danger"></div>
                    <form id="insertForm">
                        @csrf
                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Quantity Produced: (Qtl)<span class="text-danger">*</span></strong>
                                    <input type="text" name="quantity_produced" id="quantity_produced" class="form-control">
                                    <p id="quantity_produced_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Seed Available for Sale: (Qtl)<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_available_for_sale" id="seed_available_for_sale" class="form-control">
                                    <p id="seed_available_for_sale_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Seed Price (per Qtl):<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_price" id="seed_price" class="form-control">
                                    <p id="seed_price_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Reason for Shortfall: <small>(If Target not achieved)</small></strong>
                                    <textarea name="reason_for_shortfall" id="reason_for_shortfall" class="form-control"></textarea>
                                    <p id="reason_for_shortfall_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Major Constraints For Distribution:</small></strong>
                                    <textarea name="major_constraints_for_distribution" id="major_constraints_for_distribution" class="form-control"></textarea>
                                    <p id="major_constraints_for_distribution_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Reserved Seed: (Qtl)<span class="text-danger">*</span></strong>
                                    <input type="text" name="reserved_seed" id="reserved_seed" class="form-control" readonly="true">
                                    <input type="hidden" name="seed_target_item_id" id="seed_target_item_id" class="form-control">
                                    <input type="hidden" name="seed_target" id="seed_target" class="form-control">
                                    <p id="reserved_seed_error" class="text-danger"></p>
                                    <p id="seed_target_item_id_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" id="createButton" class="btn btn-primary btn-flat">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Update seed production status -->
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
                    <div id="responseMessageEdit" class="text-danger"></div>
                    <form id="editForm">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Quantity Produced: (Qtl)<span class="text-danger">*</span></strong>
                                    <input type="text" name="quantity_produced_edit" id="quantity_produced_edit" class="form-control">
                                    <p id="quantity_produced_edit_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Seed Available for Sale: (Qtl)<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_available_for_sale_edit" id="seed_available_for_sale_edit" class="form-control">
                                    <input type="hidden" name="seed_available_for_sale_old_edit" id="seed_available_for_sale_old_edit" class="form-control">
                                    <p id="seed_available_for_sale_edit_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Seed Sold: (Qtl)<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_sold_edit" id="seed_sold_edit" class="form-control">
                                    <p id="seed_sold_edit_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Seed Sold Date:<span class="text-danger">*</span></strong>
                                    <input type="date" name="seed_sold_date_edit" id="seed_sold_date_edit" class="form-control">
                                    <p id="seed_sold_date_edit_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Reason for Shortfall: <small>(If Target not achieved)</small></strong>
                                    <textarea name="reason_for_shortfall_edit" id="reason_for_shortfall_edit" class="form-control"></textarea>
                                    <p id="reason_for_shortfall_edit_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Major Constraints For Distribution:</small></strong>
                                    <textarea name="major_constraints_for_distribution_edit" id="major_constraints_for_distribution_edit" class="form-control"></textarea>
                                    <p id="major_constraints_for_distribution_edit_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Seed Price (per Qtl):<span class="text-danger">*</span></strong>
                                    <input type="text" name="seed_price_edit" id="seed_price_edit" class="form-control">
                                    <p id="seed_price_edit_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Reserved Seed: (Qtl)<span class="text-danger">*</span></strong>
                                    <input type="text" name="reserved_seed_edit" id="reserved_seed_edit" class="form-control" readonly="true">
                                    <input type="hidden" name="seed_target_item_id_edit" id="seed_target_item_id_edit" class="form-control">
                                    <input type="hidden" name="seed_target_item_status_id_edit" id="seed_target_item_status_id_edit" class="form-control">
                                    <input type="hidden" name="seed_target_edit" id="seed_target_edit" class="form-control">
                                    <p id="reserved_seed_edit_error" class="text-danger"></p>
                                    <p id="seed_target_item_id_edit_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" id="editButton" class="btn btn-primary btn-flat">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Display seed production status -->
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
                                    <td width="60%"><span id="view_quantity_produced"></span> (Qtl)</td>
                                </tr>
                                <tr>
                                    <th>Seed vailable for sale</th>
                                    <td><span id="view_seed_available_for_sale"></span> (Qtl)</td>
                                </tr>
                                <tr>
                                    <th>Seed Price (per Qtl)</th>
                                    <td><span id="view_seed_price"></span></td>
                                </tr>
                                <tr>
                                    <th>Reserved seed</th>
                                    <td><span id="view_reserved_seed"></span> (Qtl)</td>
                                </tr>
                                <tr>
                                    <th>Reason for Shortfall</th>
                                    <td><span id="reason_for_shortfalls"></span></td>
                                </tr>
                                <tr>
                                    <th>Seed Sold</th>
                                    <td><span id="seed_sold"></span> (Qtl)</td>
                                </tr>
                                <tr>
                                    <th>Seed Sold Date</th>
                                    <td><span id="seed_sold_date"></span></td>
                                </tr>
                                <tr>
                                    <th>Surplus Seed</th>
                                    <td><span id="surplus_seed"></span> (Qtl)</td>
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

function display_status(status_id,display_status){
    var status_id = status_id;
    var display_status = display_status;
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
            $('#seed_available_for_sale_old_edit').val(result.data[0].seed_available_for_sale);
            $('#seed_price_edit').val(result.data[0].seed_price);
            $('#reserved_seed_edit').val(result.data[0].reserved_seed);
            $('#reason_for_shortfall_edit').val(result.data[0].reason_for_shortfall);
            $('#major_constraints_for_distribution_edit').val(result.data[0].major_constraints_for_distribution);
            $('#seed_sold_edit').val(result.data[0].seed_sold);
            $('#seed_sold_date_edit').val(result.data[0].seed_sold_date);
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
            // console.log(result);
            $('#view_quantity_produced').html(result.data[0].quantity_produced);
            $('#view_seed_available_for_sale').html(result.data[0].seed_available_for_sale);
            $('#view_seed_price').html(result.data[0].seed_price);
            $('#view_reserved_seed').html(result.data[0].reserved_seed);
            $('#reason_for_shortfalls').html(result.data[0].reason_for_shortfall);
            $('#seed_sold').html(result.data[0].seed_sold);
            $('#seed_sold_date').html(moment(result.data[0].seed_sold_date).format('Do MMM YY'));
            $('#surplus_seed').html(result.data[0].surplus_seed);
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
                setTimeout(function(){
                    window.location.reload();
                }, 3000);
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
                    if (errors.seed_sold_edit) {
                        $('#seed_sold_edit_error').text(errors.seed_sold_edit);
                    }
                    if (errors.seed_sold_date_edit) {
                        $('#seed_sold_date_edit_error').text(errors.seed_sold_date_edit);
                    }
                    
                }
            }
        });
    });
});

function get_item_info(item_id,seed_target) {
    var item_id = item_id;
    var seed_target = seed_target;
    $('#seed_target_item_id').val(item_id);
    $('#seed_target').val(seed_target);
    $('#quantity_produced_error').text('');
    $('#seed_available_for_sale_error').text('');
    $('#seed_price_error').text('');
    $('#reserved_seed_error').text('');
    $('#seed_target_item_id_error').text('');
    $('#responseMessage').html('');
    $('#insertForm')[0].reset();
}

$("#seed_available_for_sale, #quantity_produced").keyup(function() {
    var quantity_produced = parseInt($('#quantity_produced').val());
    var seed_available_for_sale = parseInt($('#seed_available_for_sale').val());
    if(quantity_produced >= seed_available_for_sale){
        var reserved_seed = parseInt(quantity_produced - seed_available_for_sale);
        $('#reserved_seed').val(reserved_seed);
        $('#responseMessage').text('');
        $('#createButton').prop('disabled', false);
    }else{
        $('#responseMessage').text('Seed available for sale is less than or equal to quantity produced.');
        $('#seed_available_for_sale').val('');
        $('#reserved_seed').val(0);
        $('#createButton').prop('disabled', true);
    }
});

$("#seed_available_for_sale_edit, #quantity_produced_edit").keyup(function() {
    var quantity_produced = parseInt($('#quantity_produced_edit').val());
    var seed_available_for_sale = parseInt($('#seed_available_for_sale_edit').val());
    if(quantity_produced >= seed_available_for_sale){
        var reserved_seed = parseInt(quantity_produced - seed_available_for_sale);
        $('#reserved_seed_edit').val(reserved_seed);
        $('#responseMessageEdit').text('');
        $('#editButton').prop('disabled', false);
    }else{
        $('#responseMessageEdit').text('Seed available for sale is less than or equal to quantity produced.');
        $('#seed_available_for_sale_edit').val('');
        $('#reserved_seed_edit').val(0);
        $('#editButton').prop('disabled', true);
    }
});

$("#seed_sold_edit").keyup(function() {
    var seed_available_for_sale_edit = parseInt($('#seed_available_for_sale_old_edit').val());
    var seed_sold_edit = parseInt($('#seed_sold_edit').val());
    if(seed_available_for_sale_edit >= seed_sold_edit){
        var seed_available_for_sale = parseInt(seed_available_for_sale_edit - seed_sold_edit);
        $('#seed_available_for_sale_edit').val(seed_available_for_sale);
        $('#responseMessageEdit').text('');
        $('#editButton').prop('disabled', false);
    }else{
        $('#responseMessageEdit').text('You can not sale more than available seed.');
        $('#seed_sold_edit').val();
        $('#editButton').prop('disabled', true);
    }
    
});

$(document).ready(function() {
    $('#insertForm').on('submit', function(e) {
        e.preventDefault();
        $('#quantity_produced_error').text('');
        $('#seed_available_for_sale_error').text('');
        $('#seed_price_error').text('');
        $('#reserved_seed_error').text('');
        $('#seed_target_item_id_error').text('');
        $('#reason_for_shortfall_error').text('');
        $('#responseMessage').html('');
        
        $.ajax({
            url: "{{ route('seed-production-statuses.store') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $('#responseMessage').html('<p style="color: green;">' + response.message +'</p>');
                $('#insertForm')[0].reset();
                setTimeout(function(){
                    window.location.reload();
                }, 3000);
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
                    if (errors.reason_for_shortfall){
                        $('#reason_for_shortfall_error').text(errors.reason_for_shortfall);
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
            updateDropdowns();
        }
    });
}

$(document).ready(function() {
    i = "{{$key}}";
    $(".btn-add-more").click(function(e) {
        if($('.crop_id').val()==''){
            alert('Please select crop name first.');
            return false;
        }
        e.preventDefault();
        i++;
        get_selected_varieties_by_crop('variety_id_' + i);
        $(".table-add-more tbody").append('<tr> <td><input type="hidden" name="items['+i+'][id]" value=""> <strong>Variety Name:<span class="text-danger">*</span></strong> <select name="items['+i +'][variety_id]" id="variety_id_'+i+'" class="form-control variety_id"> <option value="">Choose Crop Name First</option> </select> <input type="hidden" name="items['+i +'][seed_target_id]" value="{{ $seed_target->id }}"></td> <td> <strong>Seed Category:<span class="text-danger">*</span></strong> <select name="items['+i+'][category_id]" class="form-control"> <option value="">Choose Seed Category</option> @if(!empty($categories)) @foreach($categories as $category) <option value="{{ $category->id }}">{{ $category->name }}</option> @endforeach @endif </select> </td> <td> <strong>Total Seed Quantity (Qtl):<span class="text-danger">*</span></strong> <input type="text" name="items['+i+'][total_seed_quantity]" class="form-control" placeholder="Total Seed Quantity"> <input type="hidden" name="items['+i+'][created_by]" value="{{ Auth::user()->id }}"></td> <td><button class="btn btn-outline-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i></button></td> </tr>');
        updateDropdowns();
    });
    $(document).on('click', '.btn-add-more-rm', function() {
        $(this).parents("tr").remove();
        $(this).parent().remove();
        updateDropdowns();
    });
    $(document).on("change", ".variety_id", function () {
        updateDropdowns();
    });
});

//Remove the selected options from variety dropdown
function updateDropdowns() {
    let selectedValues = $(".variety_id").map(function () {
        return $(this).val();      
    }).get();
    $(".variety_id").each(function () {
        let currentValue = $(this).val();
        $(this).find("option").each(function () {
            if ($(this).val() !== "" && selectedValues.includes($(this).val()) && $(this).val() !== currentValue) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
}

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