<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                @for ($i = 1; $i <= 3; $i++) 
                    <a href="#" class="dropdown-item">
                        <div class="media">
                            @if(!empty(Auth::user()->avatar))
                                <img src="{{ asset('storage/profiles/' . Auth::user()->avatar) }}" class="img-size-50 mr-3 img-circle">
                            @else
                                <img src="{{ asset('storage/profiles/avatar.png') }}" class="img-size-50 mr-3 img-circle">
                            @endif
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $i }} Hours Ago</p>
                            </div>
                        </div>
                    </a>
                <div class="dropdown-divider"></div>
                @endfor
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i> <span class="badge badge-warning navbar-badge">8</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">8 Notifications</span>
                <div class="dropdown-divider"></div>
                @for ($i = 1; $i <= 5; $i++) 
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> {{ $i + 2 }} new messages
                        <span class="float-right text-muted text-sm">{{ $i }} mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                @endfor
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="box-profile">
                    <div class="text-center">
                        @if(!empty(Auth::user()->avatar))
                            <img src="{{ asset('storage/profiles/' . Auth::user()->avatar) }}" class="profile-user-img img-fluid img-circle" style="border: 2px solid #adb5bd;margin: -7px 0px;padding: 1px;width: 40px;">
                        @else
                            <img src="{{ asset('storage/profiles/avatar.png') }}" class="profile-user-img img-fluid img-circle" style="border: 2px solid #adb5bd;margin: -7px 0px;padding: 1px;width: 40px;">
                        @endif
                        {{ Auth::user()->name }} <i class="fas fa-caret-down mr-2"></i>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if(!empty(Auth::user()->avatar))
                            <img src="{{ asset('storage/profiles/' . Auth::user()->avatar) }}" class="profile-user-img img-fluid img-circle">
                        @else
                            <img src="{{ asset('storage/profiles/avatar.png') }}" class="profile-user-img img-fluid img-circle">
                        @endif
                        
                    </div>
                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                    @php $roles = Auth::user()->roles->pluck('name'); @endphp

                    <div class="text-center mb-2">
                        @foreach(Auth::user()->roles->pluck('name') as $role)
                        <label class="badge badge-success">{{ $role }}</label>
                        @endforeach
                    </div>

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('profile') }}" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ url('/password/reset') }}" class="dropdown-item">
                        <i class="fas fa-lock mr-2"></i> Change Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="" class="dropdown-item">
                        <i class="fas fa-cog mr-2"></i> Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="dropdown-item">
                        <i class="fas fa-power-off mr-2" aria-hidden="true"></i>
                        {{ __('Logout') }}

                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </li>
    </ul>
</nav>