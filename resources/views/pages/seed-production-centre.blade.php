@extends('layouts.default')
@section('page_title', 'About Page')
@section('description', 'About Page description')
@section('keywords', 'About Page keywords')
@section('content')

<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade"
    style="background-image: url({{ asset('assets/img/mustard_page_banner.jpg') }});">
    <div class="container position-relative">
        <h1>Seed Production Centre</h1>
        <p>The primary goal is to make high-quality seeds readily available to farmers in their local areas. </p>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">Seed Production Centre</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- About 3 Section -->
<section id="about-3" class="about-3 section">

    <div class="container">
        <div class="row g-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped data-table" id="example1" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Centre Name</th>
                            <th>Zone</th>
                            <th>State</th>
                            <th>User Name</th>
                            <th>Controlling Authority</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($centres))
                        @foreach($centres as $key => $centre)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $centre->centre_name}} <br> {{ $centre->centre_address }}-{{ $centre->pincode }}</td>
                            <td>{{ $centre->zone->zone_name }}</td>
                            <td>{{ $centre->state->state_name }}</td>
                            <td>{{ $centre->user->name }}</td>
                            <td>{{ $centre->controllingAuthority->authority_name }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7"><p class="text-danger text-center">No data available in table!</p></td>
                        </tr>
                        @endif
                    </tbody>
                    <tfooter>
                        <tr>
                            <th>#</th>
                            <th>Centre Name</th>
                            <th>Zone</th>
                            <th>State</th>
                            <th>User Name</th>
                            <th>Controlling Authority</th>
                        </tr>
                    </tfooter>
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

        });

    });
</script>
@endsection

@section('additional_css')
@endsection