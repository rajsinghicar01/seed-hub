@extends('admin.layouts.admin-app')
@section('page_title','Profile')

@section('main_headeing','Profile')
@section('sub_headeing','Update Profile')

@section('content_section')

<div class="card-header">
    <h3 class="card-title">@yield('sub_headeing')</h3>
</div>
<div class="card-body">

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Something went wrong.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success! </strong> {{ $message }}
        </div>
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if(!empty($user->avatar))
                                    @if(str_contains($user->avatar, 'https'))
                                        <img src="{{ Auth::user()->avatar }}" class="profile-user-img img-fluid img-circle">
                                    @else
                                        <img src="{{ asset('storage/profiles/' . Auth::user()->avatar) }}" class="profile-user-img img-fluid img-circle">
                                    @endif
                                @else
                                    <img src="{{ asset('storage/profiles/avatar.png') }}" class="profile-user-img img-fluid img-circle">
                                @endif
                            </div>
                            <h3 class="profile-username text-center">{{ $user->name }}</h3>
                            <p class="text-muted text-center">{{ ($user->Designation)? $user->Designation->name:'' }}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b><i class="fa fa-envelope" aria-hidden="true"></i></b> <a class="float-right">{{ $user->email }}</a>
                                </li>
                                @if(!empty($user->phone))
                                <li class="list-group-item">
                                    <b><i class="fa fa-phone-square" aria-hidden="true"></i></b> <a class="float-right">+91-{{ $user->phone }}</a>
                                </li>
                                @endif
                            </ul>
                            @if($user->status)
                            <a href="javascript::void();" class="btn btn-primary btn-block"><b><i class="fa fa-check-circle" aria-hidden="true"></i> Active</b></a>
                            @else
                            <a href="javascript::void();" class="btn btn-warning btn-block"><b><i class="fa fa-phone-square" aria-hidden="true"></i> Pending</b></a>
                            @endif
                        </div>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user mr-1"></i> About Me</h3>
                        </div>
                        <div class="card-body">
                            @if($user->address)
                            <strong><i class="fas fa-map mr-1"></i> Address</strong>
                            <p class="text-muted">{{ $user->address }}</p>
                            <hr>
                            @endif
                            @if($user->pincode)
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Pincode</strong>
                            <p class="text-muted">{{ $user->pincode }}</p>
                            <hr>
                            @endif
                            <strong><i class="far fa-calendar-alt mr-1"></i> Member since</strong>
                            <p class="text-muted">{{ $user->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" class="form-horizontal" action="{{ route('update_profile', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Phone<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" value="{{ $user->address }}" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pincode</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pincode" value="{{ $user->pincode }}" placeholder="Pincode">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Avatar</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="avatar">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection