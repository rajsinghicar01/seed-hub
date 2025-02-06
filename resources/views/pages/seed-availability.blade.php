@extends('layouts.default')
@section('page_title', 'Seed Availability: Seed Hub')
@section('description', 'Seed Availability: Seed Hub')
@section('keywords', 'Seed Availability: Seed Hub')
@section('content')

<div class="page-title dark-background" data-aos="fade"
    style="background-image: url({{ asset('assets/img/mustard_page_banner.jpg') }});">
    <div class="container position-relative">
        <h1>Seed Availability: Seed Hub</h1>
        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam
            molestias.</p>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">Seed Availability: Seed Hub</li>
            </ol>
        </nav>
    </div>
</div>

<section id="services" class="services section">
    <div class="container section-title" data-aos="fade-up">
        <h2>SERVICES</h2>
        <p>Providing Fresh Produce Every Single Day</p>
    </div>
    <div class="content">
        <div class="container">

            <div class="row g-0">
                <form class="form-inline" action="/action_page.php">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Recommended Zone:</label>
                            <select name="zone" id="zone-dropdown" class="form-control">
                                <option value="">Choose any option</option>
                                @if(!empty($zones))
                                @foreach($zones as $zone)
                                <option value="{{ $zone->id}}">{{ $zone->zone_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Recommended State:</label>
                            <select name="state" id="state-dropdown" class="form-control">
                                <option value="">Select zone first</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Centre Name:</label>
                            <select name="centre" id="centre-dropdown" class="form-control">
                                <option>Choose any option</option>
                                @if(!empty($centres))
                                @foreach($centres as $centre)
                                <option value="{{ $centre->id}}">{{ $centre->centre_name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Crop Name:</label>
                            <select name="crop" id="crop-dropdown" class="js-example-basic-single form-control">
                                <option value="">Choose any option</option>
                                @if(!empty($crops))
                                @foreach($crops as $crop)
                                <option value="{{ $crop->id}}">{{ $crop->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label>Variety:</label>
                            <select name="variety" id="variety-dropdown" class="form-control">
                                <option value="">Choose crop first</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Seed Category:</label>
                            <select name="category" id="category-dropdown" class="form-control">
                                <option value="">Choose any option</option>
                                @if(!empty($categories))
                                @foreach($categories as $category)
                                <option value="{{ $category->id}}">{{ $category->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <br>
                            <button type="submit" class="btn btn-success"><i class="bi bi-search"></i> Search</button>
                        </div>
                    </div>

                </form>
            </div>

            <div class="row g-0">
                <div class="table-responsive" id="printarea">
                    <table id="example" class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Crop Name</th>
                                <th>Crop Season</th>
                                <th>Centre Details</th>
                                <th>Contact Address</th>
                                <th>Centre Incharge</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Seed Production Items</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($seed_targets))
                            @foreach($seed_targets as $key => $seed_target)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $seed_target->crop->name }}</td>
                                <td>{{ $seed_target->season->name }}</td>
                                <td>{{ $seed_target->centre->centre_name }}</td>
                                <td>{{ $seed_target->centre->centre_address }}</td>
                                <td>{{ $seed_target->centre->user->name }}</td>
                                <td>{{ $seed_target->centre->user->email }}</td>
                                <td>+91-{{ $seed_target->centre->user->phone }}</td>
                                <td>
                                    @if(!empty($seed_target->items))
                                    <div class="table-responsive">
                                        <table class="display item-tbl table table-striped">
                                            <tr>
                                                <th>Variety</th>
                                                <th>Category</th>
                                                <th>Total Seed Qty</th>
                                                <th>Status</th>
                                            </tr>
                                            @foreach($seed_target->items as $item)
                                            <tr>
                                                <td>{{ $item->variety->variety_name }}</td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ $item->total_seed_quantity }}</td>
                                                <td>--</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Crop Name</th>
                                <th>Crop Season</th>
                                <th>Centre Details</th>
                                <th>Contact Address</th>
                                <th>Centre Incharge</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Seed Production Items</th>
                            </tr>
                        </tfoot> -->
                    </table>
                </div>
            </div>

        </div>
    </div>
</section><!-- /Services Section -->


@stop

@section('additional_js')
<script>
new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['csv', 'print']
        }
    }
});



// buttons: ['copy', 'csv', 'excel', 'pdf', 'print']


$(document).ready(function() {
    $('#zone-dropdown').on('change', function() {
        var zone_id = this.value;
        $("#state-dropdown").html('');
        $.ajax({
            url: "{{ route('get_states_by_zone_front') }}",
            type: "POST",
            data: {
                zone_id: zone_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#state-dropdown').html('<option value="">Select State</option>');
                $.each(result.states, function(key, value) {
                    $("#state-dropdown").append('<option value="' + value.id + '">' + value.state_name + '</option>');
                });
            }
        });
    });
});

$(document).ready(function() {
    $('#crop-dropdown').on('change', function() {
        var crop_id = this.value;
        var crop_name = $(this).find("option:selected").text();
        // alert(crop_name);
        $("#variety-dropdown").html('');
        $.ajax({
            url: "{{ route('get_variety_by_crop') }}",
            type: "POST",
            data: {
                crop_id: crop_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#variety-dropdown').html('<option value="">Select Variety</option>');
                $.each(result.varieties, function(key, value) {
                    $("#variety-dropdown").append('<option value="' + value.id + '">' + value.variety_name + '</option>');
                });
            }
        });
    });
});


$("#btn").click(function () {
    //Hide all other elements other than printarea.
    $("#printarea").show();
    window.print();
});
</script>
@endsection

@section('additional_css')
<style>
.form-control {
    width: 90% !important;
}

form.form-inline {
    display: inline-flex !important;
    margin-bottom: 25px;
}

@media only screen and (max-width: 600px) {
    .form-group {
        margin-bottom: 10px;
    }

    .form-control {
        width: 100% !important;
    }

    form.form-inline {
        display: block !important;
    }
}

select {
    appearance: auto !important;
}


@media (min-width: 1400px) {
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        max-width: 1600px;
    }
}

.item-tbl tr{
  border: 1px solid #dbd5d5 !important;
}
.item-tbl th{
  border: 1px solid #dbd5d5 !important;
}
.item-tbl td {
  border: 1px solid #dbd5d5 !important;
}
</style>
@endsection