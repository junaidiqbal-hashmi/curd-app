@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <main>
        @include('include.page_header')
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <hr class="mt-0 mb-4" />
            <!-- Display success message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display error messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8">
                    <!-- Change password card-->
                    <div class="card mb-4">
                        <div class="card-header">User Profile</div>
                        <div class="card-body">
                            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"
                                onsubmit="validateForm(event, this, 1)" autocomplete="off">
                                <!-- Form Group (current password)-->
                                @csrf
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="Name">Name</label>
                                        <input class="form-control" id="name" type="text" name="name"
                                            placeholder="Enter Name" Value="{{ $user->name }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control" id="email" type="email" name="email"
                                            placeholder="Enter Name" Value="{{ $user->email }}" />
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="phone">Phone</label>
                                        <input class="form-control" id="phone" type="text" name="phone"
                                            placeholder="Enter Name" Value="{{ $user->phone }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="district">District</label>
                                        <input class="form-control" id="district" type="text" name="district"
                                            placeholder="Enter Name" Value="{{ $user->district }}" />
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="epo_id">Entry point Office</label>
                                        <input class="form-control" id="epo_id" type="text" name="epo_id"
                                            placeholder="Enter Name" Value="{{ $user->entry_point_office->title ?? '' }}" />
                                    </div>
                                </div>
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
                            <img class="img-account-profile rounded-circle mb-2" id="profile-image"
                                src="{{ asset('images/profile_pictures/default.png') }}" alt="" />
                            <!-- Profile picture help block-->

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">Update Password</div>
                        <div class="card-body">
                            <form action="{{ route('change.password', $user->id) }}" method="POST"
                                enctype="multipart/form-data" onsubmit="validateForm(event, this, 1)" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="password">Password</label>
                                        <input class="form-control" id="password" type="password" name="password"
                                            placeholder="New Password" Value="" required />
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="password_confirmation">Confirm Password</label>
                                        <input class="form-control" id="password_confirmation" type="password"
                                            name="password_confirmation" placeholder="Confirm Password" Value=""
                                            required />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" type="button">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('scripts')
    <script></script>
@endsection
