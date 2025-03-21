@extends('layouts.default')
@section('page_title', 'About Page')
@section('description', 'About Page description')
@section('keywords', 'About Page keywords')
@section('content')

<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade"
    style="background-image: url({{ asset('assets/img/mustard_page_banner.jpg') }});">
    <div class="container position-relative">
        <h1>About Us</h1>
        <p>The primary goal is to make high-quality seeds readily available to farmers in their local areas. </p>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">About Us</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- About 3 Section -->
<section id="about-3" class="about-3 section">

    <div class="container">
        <div class="row gy-4 justify-content-between align-items-center">
            <div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
                <img src="{{ asset('assets/img/about-us.jpg') }}" alt="Image" class="img-fluid">
                <!-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn">
                    <span class="play"><i class="bi bi-play-fill"></i></span>
                </a> -->
            </div>
            <div class="col-lg-5 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                <h2 class="content-title mb-4">About Mustard Seed Hub Portal</h2>
                <p class="mb-4">
                    Seed Hubs is a strategic initiative, with the goal of ensuring the availability of high-quality
                    seeds locally, boosting productivity, and supporting farmers. Seed hub is being proven as vehicle
                    for faster seed replacement and an effective means for seed extension especially in Rapeseed-Mustard
                </p>

                <ul class="list-unstyled list-check">
                    <li>Seed Hubs aim to increase the production and availability of quality seeds, particularly for
                        rapeseed-mustard, to enhance productivity. </li>
                    <li>Seed Hubs encompass various activities, including seed production, storage, processing,
                        certification, and marketing</li>
                    <li>Seed Hubs focus on producing seeds that meet stringent quality standards, including genetic
                        purity and germination rates</li>
                    <li>Seed Hubs can contribute to increased productivity, higher yields, and improved income for
                        farmers by ensuring access to quality seeds</li>
                </ul>

                <p><a href="{{ route('contact') }}" class="btn-cta">Get in touch</a></p>
            </div>
        </div>
    </div>
</section><!-- /About 3 Section -->



@stop


@section('additional_js')
@endsection

@section('additional_css')
@endsection