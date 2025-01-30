@extends('layouts.default')
@section('page_title', 'Seed Availability: Seed Hub')
@section('description', 'Seed Availability: Seed Hub')
@section('keywords', 'Seed Availability: Seed Hub')
@section('content')

<!-- Page Title -->
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
</div><!-- End Page Title -->

<!-- Services Section -->
<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>SERVICES</h2>
        <p>Providing Fresh Produce Every Single Day</p>
    </div><!-- End Section Title -->
    <div class="content">
        <div class="container">

            <div class="row g-0">
                <form class="form-inline" action="/action_page.php">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Crop Name:</label>
                            <select name="crop_name" class="js-example-basic-single form-control">
                                <option>Choose any option</option>
                                <option>Option 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Recommended Zone/State:</label>
                            <select name="crop_name" class="form-control">
                                <option>Choose any option</option>
                                <option>Option 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Centre Name:</label>
                            <select name="crop_name" class="form-control">
                                <option>Choose any option</option>
                                <option>Option 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Variety Name:</label>
                            <select name="crop_name" class="form-control">
                                <option>Choose any option</option>
                                <option>Option 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Seed Category:</label>
                            <select name="crop_name" class="form-control">
                                <option>Choose any option</option>
                                <option>Option 1</option>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
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
                            @for($i=1; $i<=10; $i++) <tr>
                                <td>{{ $i }}</td>
                                <td>NBeG-452</td>
                                <td>AP, Telangana</td>
                                <td>Foundation Seed (FS)</td>
                                <td>238.00</td>
                                <td>10000</td>
                                <td>Bharatpur Rajasthan</td>
                                <td>Programme Coordinator, Krishi Vigyan Kendra, Reddipalli, Bukkarayasamudram (M) </td>
                                <td>Programme Coordinator</td>
                                <td>loremipsome@gmail.com</td>
                                <td>+91-9988774455</td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Services Section -->


@stop




@section('additional_js')
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
</style>
@endsection