<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('admin-assets/dist/img/favicon.png') }}" alt="{{config('app.name')}} Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ str_replace('_',' ',config('app.name'))}}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">USER MENU</li>
                <li class="nav-item {{ Request::segment(2) == 'dashboard' ? 'menu-open' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::segment(2) == 'home' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @canany(['user-list', 'user-create', 'user-edit', 'user-delete'])
                <li class="nav-item {{ Request::segment(2) == 'users' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'users' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ Route::current()->getName() == 'users.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'users.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @canany(['role-list', 'role-create', 'role-edit', 'role-delete'])
                <li class="nav-item {{ Request::segment(2) == 'roles' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'roles' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Roles <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'roles.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('roles.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'roles.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Role</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @canany(['permission-list', 'permission-create', 'permission-edit', 'permission-delete'])
                <li class="nav-item {{ Request::segment(2) == 'permissions' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'permissions' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-unlock"></i>
                        <p>Permissions <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('permissions.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'permissions.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('permissions.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'permissions.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Permission</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @canany(['designation-list', 'designation-create', 'designation-edit', 'designation-delete'])
                <li class="nav-item {{ Request::segment(2) == 'designations' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'designations' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>Designations<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('designations.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'designations.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Designations</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('designations.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'designations.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Designation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                <li class="nav-header">MASTERS MENU</li>
                @canany(['crop-list', 'crop-create', 'crop-edit', 'crop-delete'])
                <li class="nav-item {{ Request::segment(2) == 'crops' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'crops' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-leaf"></i>
                        <p>Crops <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('crops.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'crops.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Crops</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('crops.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'crops.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Crop</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @canany(['variety-list', 'variety-create', 'variety-edit', 'variety-delete'])
                <li class="nav-item {{ Request::segment(2) == 'varieties' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'varieties' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Varieties<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('varieties.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'varieties.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Varieties</p>
                            </a>
                        </li>
                        @can(['variety-create'])
                        <li class="nav-item">
                            <a href="{{route('varieties.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'varieties.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Variety</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @canany(['category-list', 'category-create', 'category-edit', 'category-delete'])
                <li class="nav-item {{ Request::segment(2) == 'categories' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'categories' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Seed Categories <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categories.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'categories.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Seed Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('categories.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'categories.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Seed Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @canany(['season-list', 'season-create', 'season-edit', 'season-delete'])
                <li class="nav-item {{ Request::segment(2) == 'seasons' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'seasons' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Cropping Seasons<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('seasons.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'seasons.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Cropping Seasons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('seasons.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'seasons.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Cropping Season</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @canany(['state-list', 'state-create', 'state-edit', 'state-delete'])
                <li class="nav-item {{ Request::segment(2) == 'states' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'states' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>States<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('states.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'states.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All States</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('states.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'states.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New State</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @canany(['zone-list', 'zone-create', 'zone-edit', 'zone-delete'])
                <li class="nav-item {{ Request::segment(2) == 'zones' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'zones' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-crosshairs"></i>
                        <p>Zones<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('zones.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'zones.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Zones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('zones.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'zones.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Zone</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @canany(['controlling-authority-list', 'controlling-authority-create', 'controlling-authority-edit', 'controlling-authority-delete'])
                <li class="nav-item {{ Request::segment(2) == 'controlling-authorities' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'controlling-authorities' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-user-secret"></i>
                        <p>Controlling Authorities<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('controlling-authorities.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'controlling-authorities.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Controlling Authorities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('controlling-authorities.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'controlling-authorities.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Controlling Authority</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @canany(['centre-list', 'centre-create', 'centre-edit', 'centre-delete'])
                <li class="nav-item {{ Request::segment(2) == 'centres' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'centres' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-building"></i>
                        <p>Centres<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('centres.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'centres.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Centres</p>
                            </a>
                        </li>
                        @canany(['centre-create'])
                        <li class="nav-item">
                            <a href="{{route('centres.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'centres.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Centre</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @canany(['seed-target-list', 'seed-target-create', 'seed-target-edit', 'seed-target-delete'])
                <li class="nav-item {{ Request::segment(2) == 'seed-targets' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'seed-targets' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-envelope"></i>
                        <p>Seed Targets<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('seed-targets.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'seed-targets.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Seed Targets</p>
                            </a>
                        </li>
                        @canany(['seed-target-create'])
                        <li class="nav-item">
                            <a href="{{route('seed-targets.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'seed-targets.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Seed Target</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @canany(['revolving-fund-allocation-list', 'revolving-fund-allocation-create', 'revolving-fund-allocation-edit', 'revolving-fund-allocation-delete'])
                <li class="nav-item {{ Request::segment(2) == 'revolving-fund-allocations' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'revolving-fund-allocations' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>Fund Allocation<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('revolving-fund-allocations.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'revolving-fund-allocations.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Fund Allocations</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('revolving-fund-allocations.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'revolving-fund-allocations.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Fund Allocation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @canany(['revolving-fund-list', 'revolving-fund-create', 'revolving-fund-edit', 'revolving-fund-delete'])
                <li class="nav-item {{ Request::segment(2) == 'revolving-funds' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'revolving-funds' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>Revolving Funds<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('revolving-funds.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'revolving-funds.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Revolving Funds</p>
                            </a>
                        </li>
                        @canany(['revolving-fund-create'])
                        <li class="nav-item">
                            <a href="{{route('revolving-funds.create')}}"
                                class="nav-link {{ Route::current()->getName() == 'revolving-funds.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Revolving Fund</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @canany(['report-list', 'report-create', 'report-edit', 'report-delete'])
                <li class="nav-item {{ Request::segment(2) == 'reports' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'reports' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Reports<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('reports.index')}}"
                                class="nav-link {{ Route::current()->getName() == 'reports.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Seed Target Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @canany(['setting-list', 'setting-create', 'setting-edit', 'setting-delete'])
                <li class="nav-item {{ Request::segment(2) == 'settings' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::segment(2) == 'settings' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('settings.index') }}"
                                class="nav-link {{ Route::current()->getName() == 'settings.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tags</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @canany(['activity-log-list', 'activity-log-create', 'activity-log-edit', 'activity-log-delete'])
                <li class="nav-item">
                    <a href="{{ route('activity.logs') }}" class="nav-link {{ Request::segment(2) == 'activity-logs' ? 'active' : '' }}" >
                        <i class="nav-icon fas fa-history"></i>
                        <p>Activity Logs</p>
                    </a>
                </li>
                @endcan

                <li class="nav-header">EXTRAS</li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-link">
                        <i class="nav-icon fas fa-power-off text-danger" aria-hidden="true"></i>
                        <p class="text">{{ __('Logout') }}</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>