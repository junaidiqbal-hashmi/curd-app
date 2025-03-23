@extends('layouts.master')

@section('title', $title ?? 'Dashboard')

@section('content')
<main>
    @include('include.page_header')
    <!-- Example DataTable for Dashboard Demo-->
    <div class="container-xl px-4 mt-4">
        <div class="card card-header-actions mb-4">
            <div class="card-header">
                Users
            <a href="{{route('operators.create')}}" class="btn btn-outline-teal">Add New</a>
            </div>
           
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Profile</th>
                            <th>Email | Phone</th>
                            <th>License No</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email | Phone</th>
                            <th>Profile</th>
                            <th>License No</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td><img  src="{{ asset('images/profile_pictures/' . ($user->profile_picture ?? 'default.png')) }}" style="width: 50px; border-radius: 24px;" alt="profile Picture"></td>
                            <td>{{$user->email ?? $user->phone }}</td>
                            <td>{{$user->license_no}}</td>
                            <td>{{$user->role->title}}</td>
                            <td>
                                <div class="badge bg-primary text-white rounded-pill">Active</div>
                            </td>
                            <td>
                                <!-- <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="actionDropdown">
                                    <li><a class="dropdown-item" href="#">View</a></li>
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                </ul> -->
                                <button class="btn btn-datatable btn-icon btn-transparent-dark" onclick="confirmDelete('{{ route('user.destroy', $user->id) }}', '{{ $user->id }}')"><i class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection