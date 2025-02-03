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
                            <select name="crop_name" class="form-control">
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
                            <select name="state" class="form-control">
                                <option>Choose any option</option>
                                @if(!empty($states))
                                @foreach($states as $state)
                                <option value="{{ $state->id}}">{{ $state->state_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Centre Name:</label>
                            <select name="crop_name" class="form-control">
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
                            <select name="crop_name" class="js-example-basic-single form-control">
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
                            <select name="crop_name" class="form-control">
                                <option value="">Choose any option</option>
                                @if(!empty($varieties))
                                @foreach($varieties as $variety)
                                <option value="{{ $variety->id}}">{{ $variety->variety_name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Seed Category:</label>
                            <select name="crop_name" class="form-control">
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
                <div class="">
                    <table id="example" class="display table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Variety Name</th>
                                <th>Recommended Zone / State</th>
                                <th>Seed Category</th>
                                <th>Seed Available (Quintals)</th>
                                <th>Rate</th>
                                <th>Centre Name</th>
                                <th>Contact Address</th>
                                <th>Centre Incharge</th>
                                <th>Email</th>
                                <th>Mobile</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($seed_targets))
                            @foreach($seed_targets as $key => $seed_target)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>NBeG-452</td>
                                <td>AP, Telangana</td>
                                <td>Foundation Seed (FS)</td>
                                <td>238.00</td>
                                <td>10000</td>
                                <td>{{ $seed_target->centre->centre_name }}</td>
                                <td>Programme Coordinator, Krishi Vigyan Kendra, Reddipalli, Bukkarayasamudram (M) </td>
                                <td>Programme Coordinator</td>
                                <td>loremipsome@gmail.com</td>
                                <td>+91-9988774455</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Variety Name</th>
                                <th>Recommended Zone / State</th>
                                <th>Seed Category</th>
                                <th>Seed Available (Quintals)</th>
                                <th>Rate</th>
                                <th>Centre Name</th>
                                <th>Contact Address</th>
                                <th>Centre Incharge</th>
                                <th>Email</th>
                                <th>Mobile</th>
                            </tr>
                        </tfoot>
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
</style>
@endsection