<footer id="footer" class="footer dark-background">

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                        <!-- <span class="sitename">{{ str_replace('_',' ',config('app.name')) }}</span> -->
                        <img src="{{ asset('assets/img/seed_hub_logo.png') }}" alt="{{ str_replace('_',' ',config('app.name')) }} Logo">
                    </a>
                    <div class="footer-contact pt-3">
                        <p>{{ getSetting('site_name') }}</p>
                        <p>{{ getSetting('site_address') }}</p>
                        <p class="mt-3"><strong>Phone:</strong> <span><a href="tel:{{ getSetting('site_phone') }}">{{ getSetting('site_phone') }}</a></span></p>
                        <p><strong>Email:</strong> <span><a href="mailto:{{ getSetting('site_email') }}">{{ getSetting('site_email') }}</a></span></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About us</a></li>
                        <li><a href="{{ route('centres') }}">Seed Production Centre</a></li>
                        <li><a href="{{ route('seed-availability') }}">Seed Availability</a></li>
                        <li><a href="{{ route('varieties-in-seed-chain') }}">Varieties in Seed Chain</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-5 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="{{ route('services') }}#breeder-seed-production">Breeder Seed Production</a></li>
                        <li><a href="{{ route('services') }}#certified-seed-production">Certified Seed Production</a></li>
                        <li><a href="{{ route('services') }}#foundation-seed-production">Foundation Seed Production</a></li>
                        <li><a href="{{ route('services') }}#seed-marketing">Seed Marketing</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-2 footer-links">
                    <h4>Imported Links</h4>
                    <ul>
                        <li><a href="https://mail.icar.gov.in/" target="_blank">ICAR-Unified Communications</a></li>
                        <li><a href="http://misfms.icar.gov.in/" target="_blank">FMS/MIS of ICAR</a></li>
                        <li><a href="http://icarerp.iasri.res.in" target="_blank">ICAR-ERP System</a></li>
                        <li><a href="http://hypm.iasri.res.in/" target="_blank">HYPM</a></li>
                        <li><a href="https://krishi.icar.gov.in/" target="_blank">ICAR-KRISHI</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="copyright text-center">
        <div
            class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

            <div class="d-flex flex-column align-items-center align-items-lg-start">
                <div>
                    © Copyright <strong><span>{{ getSetting('site_name') }}</span></strong>. All Rights Reserved
                </div>
                <!-- <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div> -->
            </div>

            <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                <a href="javascript::void();"><i class="bi bi-twitter-x"></i></a>
                <a href="javascript::void();"><i class="bi bi-facebook"></i></a>
                <a href="javascript::void();"><i class="bi bi-instagram"></i></a>
                <a href="javascript::void();"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script> -->
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Datatables js files -->
<script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.buttons.js') }}"></script>
<script src="{{ asset('assets/js/buttons.dataTables.js') }}"></script>
<script src="{{ asset('assets/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>