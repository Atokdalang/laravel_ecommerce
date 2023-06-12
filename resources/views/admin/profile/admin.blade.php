@extends('layouts.admin')

@section('content')
    <main>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-5 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-2 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="{{ asset('storage/' . $user->image_profile) }}">
                        <span class="font-weight-bold">{{ $user->username }}</span>
                        <span class="text-black-50">{{ $user->email }}</span>
                        @if ($user->roles->isNotEmpty())
                            @foreach ($user->roles as $role)
                                <span
                                    class="badge {{ $role->name == 'admin' ? 'bg-success' : 'bg-primary' }}">{{ $role->name }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <form action="{{ route('profile.admin.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Name</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ $user->username }}" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="address1" class="labels">Address 1</label>
                                    <input type="text" class="form-control" id="address1" name="address1"
                                        value="{{ $user->address1 ?? '' }}" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="address2" class="labels">Address 2</label>
                                    <input type="text" class="form-control" id="address2" name="address2"
                                        value="{{ $user->address2 ?? '' }}" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="email" class="labels">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="password" class="labels">Create Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="phone" class="labels">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ $user->phone }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="image_profile" class="labels">Profile Image</label>
                                <input type="file" class="form-control" id="image_profile" name="profile_image">
                            </div>
                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
