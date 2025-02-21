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
                <form class="form-inline">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Recommended Zone:</label>
                            <select name="zone" id="zone" class="form-control">
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
                            <select name="state" id="state" class="form-control">
                                <option value="">Select zone first</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Centre Name:</label>
                            <select name="centre" id="centre" class="form-control">
                                <option value="">Choose any option</option>
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
                            <select name="crop" id="crop" class="js-example-basic-single form-control">
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
                            <select name="variety" id="variety" class="form-control">
                                <option value="">Choose crop first</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Seed Category:</label>
                            <select name="category" id="category" class="form-control">
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
                            <a href="" class="btn btn-danger"><i class="bi bi-arrow-clockwise"></i> Reset</a>
                        </div>
                    </div>

                </form>
            </div>

            <div class="row g-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped data-table" id="example1" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Crop Name</th>
                                <th>Crop Season</th>
                                <th>Centre Details</th>
                                <th>Seed Target Details</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section><!-- /Services Section -->


@stop

@section('additional_js')
<script>
$(document).ready(function() {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        exportOptions: true,
        ajax: {
            url: "{{ route('seed-availability') }}",
            data: function(d) {
                d.zone = $('#zone').val();
                d.state = $('#state').val();
                d.centre = $('#centre').val();
                d.crop = $('#crop').val();
                d.variety = $('#variety').val();
                d.category = $('#category').val();
            }
        },
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'crop_name',
                name: 'crop_name'
            },
            {
                data: 'crop_season',
                name: 'crop_season'
            },
            {
                data: 'centre_details',
                name: 'centre_details'
            },
            {
                data: 'seed_target',
                name: 'seed_target'
            },
        ],
    });

    // Apply filter on button click
    $('#zone, #state, #centre, #crop, #variety, #category').on('change', function() {
        table.ajax.reload(); 
    });

});


$(document).ready(function() {
    $('#zone').on('change', function() {
        var zone_id = this.value;
        $("#state").html('');
        $.ajax({
            url: "{{ route('get_states_by_zone_front') }}",
            type: "POST",
            data: {
                zone_id: zone_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#state').html('<option value="">Select State</option>');
                $.each(result.states, function(key, value) {
                    $("#state").append('<option value="' + value.id +
                        '">' + value.state_name + '</option>');
                });
            }
        });
    });
});

$(document).ready(function() {
    $('#crop').on('change', function() {
        var crop_id = this.value;
        var crop_name = $(this).find("option:selected").text();
        // alert(crop_name);
        $("#variety").html('');
        $.ajax({
            url: "{{ route('get_variety_by_crop') }}",
            type: "POST",
            data: {
                crop_id: crop_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#variety').html('<option value="">Select Variety</option>');
                $.each(result.varieties, function(key, value) {
                    $("#variety").append('<option value="' + value.id +
                        '">' + value.variety_name + '</option>');
                });
            }
        });
    });
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

    .container,
    .container-lg,
    .container-md,
    .container-sm,
    .container-xl,
    .container-xxl {
        max-width: 1600px;
    }
}

.centre-tbl tbody,
.centre-tbl td,
.centre-tbl tfoot,
.centre-tbl th,
.centre-tbl thead,
.centre-tbl tr {
    border: 1px solid #aaa;
    padding: 5px !important;
}
</style>
@endsection