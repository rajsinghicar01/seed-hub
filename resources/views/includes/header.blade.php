<header id="header" class="header d-flex align-items-center position-relative">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/seed_hub_logo.png') }}"
                alt="{{ str_replace('_',' ',config('app.name')) }} Logo">
            <!-- <h1 class="sitename">{{ str_replace('_',' ',config('app.name')) }}</h1> -->
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ url('/') }}" class="{{ Request::segment(1) == '' ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ Request::segment(1) == 'about-us' ? 'active' : '' }}">About Us</a></li>
                <li><a href="{{ route('centres') }}"  class="{{ Request::segment(1) == 'seed-production-centre' ? 'active' : '' }}">Seed Production Centre</a></li>
                <!-- <li class="dropdown"><a href="#"><span>Seed Production Centre</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Certified Seed</a></li>
                        <li><a href="#">Breeder Seed</a></li>
                    </ul>
                </li> -->
                <li><a href="{{ route('seed-availability') }}" class="{{ Request::segment(1) == 'seed-availability' ? 'active' : '' }}">Seed Availability</a></li>
                <li><a href="{{ route('services') }}" class="{{ Request::segment(1) == 'services' ? 'active' : '' }}">Our Services</a></li>
                <li><a href="{{ route('varieties-in-seed-chain') }}" class="{{ Request::segment(1) == 'varieties-in-seed-chain' ? 'active' : '' }}">Varieties in Seed Chain</a></li>
                <li><a href="{{ route('contact') }}" class="{{ Request::segment(1) == 'contact-us' ? 'active' : '' }}">Contact Us</a></li>
                @if (Route::has('login'))
                @auth
                <li><button onclick="window.location='{{ route('dashboard') }}'" class="btn btn-success"><i
                            class="bi bi-box-arrow-in-right"></i> Dashboard</button></li>
                @else
                <li><button onclick="window.location='{{ route('login') }}'" class="btn btn-success"><i
                            class="bi bi-box-arrow-in-right"></i> Log in</button></li>
                @if (Route::has('register'))
                <li> &nbsp; <button onclick="window.location='{{ route('register') }}'" class="btn btn-success"><i
                            class="bi bi-person-plus"></i> Register</button></li>
                @endif
                @endauth
                @endif

            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>

<style>
.container-fluid.container-xl.position-relative.d-flex.align-items-center.justify-content-between {
    max-width: 1500px;
}
</style>