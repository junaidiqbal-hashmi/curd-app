@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<main>
    @include('include.page_header')
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4" />
        <div class="row">
            <div class="col-lg-8">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header">Add Users</div>
                    <div class="card-body">
                        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data" onsubmit="validateForm(event, this, 1)" autocomplete="off">
                            <!-- Form Group (current password)-->
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="mb-3">
                                <label class="small mb-1" for="Name">Name</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="Enter Name" />
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="email">Email</label>
                                <input class="form-control" id="email" type="email" name="email" placeholder="Enter Email" />
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="phone">Phone</label>
                                <input class="form-control" id="phone" type="text" name="phone" placeholder="Enter Phone" />
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="license_no">License No</label>
                                <input class="form-control" id="license_no" type="text" name="license_no" placeholder="Enter License No" />
                            </div>
                            <!-- Form Group (new password)-->
                            <input type="hidden" id="role_id" name="role_id" value="6">
                            <!-- Upload input field -->
                            <div class="mb-3">
                                <label for="profile_picture">Profile Picture</label>
                                <input class="form-control" type="file" name="profile_picture" id="profile_picture" accept="image/*" onchange="previewImage(event)">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="password">Password</label>
                                <input class="form-control" id="password" type="password" name="password" placeholder="Password" />
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="password_confirmation">Confirm Password</label>
                                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" />
                            </div>
                            <!-- Form Group (confirm password)-->
                            <button type="submit" class="btn btn-primary" type="button">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" id="profile-image" src="{{asset('images/profile_pictures/default.png')}}" alt="" />
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-primary" onclick="document.getElementById('profile_picture').click()" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('scripts')

@endsection