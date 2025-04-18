@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<main>
    @include('include.page_header')
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4" />
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">Edit User</div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data" onsubmit="validateForm(event, this, 1)" autocomplete="off">
                            @csrf
                            @method('PUT')

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
                                <label class="small mb-1" for="name">Name</label>
                                <input class="form-control" id="name" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter Name" />
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="phone">Phone</label>
                                <input class="form-control" id="phone" type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Enter Phone" />
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="email">Email</label>
                                <input class="form-control" id="email" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Enter Email" />
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="role_id">User Role</label>
                                <select class="form-control" id="role_id" name="role_id" required>
                                    <option value="">Choose Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                            {{ $role->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="profile_picture">Profile Picture</label>
                                <input class="form-control" type="file" name="profile_picture" id="profile_picture" accept="image/*" onchange="previewImage(event)">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" id="profile-image"
                             src="{{ $user->profile_picture ? asset('images/profile_pictures/' . $user->profile_picture) : asset('images/profile_pictures/default.png') }}"
                             alt="User Image" />
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
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
