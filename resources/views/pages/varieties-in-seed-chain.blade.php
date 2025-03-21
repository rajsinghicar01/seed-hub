@extends('layouts.default')
@section('page_title', 'Varieties in Seed Chain')
@section('description', 'Seed Hub || Varieties in Seed Chain')
@section('keywords', 'Seed Hub || Varieties in Seed Chain')
@section('content')

<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade"
    style="background-image: url({{ asset('assets/img/mustard_page_banner.jpg') }});">
    <div class="container position-relative">
        <h1>Varieties in Seed Chain</h1>
        <p>The primary goal is to make high-quality seeds readily available to farmers in their local areas. </p>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">Varieties in Seed Chain</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- About 3 Section -->
<section id="about-3" class="about-3 section">

    <div class="container">
        <div class="row g-0">
        <div class="table-responsive">
                <table class="table table-bordered data-table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Crop Name</th>
                            <th>Varieties Name</th>
                            <th>Year of Notification</th>
                            <th>Average Yield</th>
                            <th>Oil Content</th>
                            <th>Day of Maturity</th>
                            <th>Release</th>
                            <!-- <th>Created By</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section><!-- /About 3 Section -->



@stop


@section('additional_js')
<script>
$(function() {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('varieties-in-seed-chain') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'crop_name',
                name: 'crop_name'
            },
            {
                data: 'variety_name',
                name: 'variety_name'
            },
            {
                data: 'year_of_notification',
                name: 'year_of_notification'
            },
            {
                data: 'average_yield',
                name: 'average_yield'
            },
            {
                data: 'oil_content',
                name: 'oil_content'
            },
            {
                data: 'day_of_maturity',
                name: 'day_of_maturity'
            },
            {
                data: 'release',
                name: 'release'
            },
            // {
            //     data: 'created_by',
            //     name: 'created_by'
            // },
        ]
    });

});
</script>
@endsection

@section('additional_css')
@endsection