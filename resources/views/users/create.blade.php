@extends('layouts.global')

@section('title')
    Create New User
@endsection

@section('content')
    {{-- <form action="{{ route('users.store') }}" method="POST">
        @csrf
    </form> --}}
<div class="container">
    <div class="col-md-12">

        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form action="{{route('users.store')}}" class="bg-white shadow-sm p-3" enctype="multipart/form-data" method="POST">

            @csrf

            <label for="name">Name</label>

            <input type="text" name="name" id="name" class="form-control {{ $errors->first('name') ? "is-invalid" : "" }}" placeholder="Full Name" value="{{ old('name') }}">
            <div class="invalid-feedback">
                {{  $errors->first('name') }}
            </div>
            <br>

            <label for="username">Username</label>

            <input type="text" name="username" id="username" class="form-control {{ $errors->first('username') ? "is-invalid" : "" }}" value="{{ old('username') }}">
            <div class="invalid-feedback">
                {{ $errors->first('username') }}
            </div>
            <br>

            <label for="">Roles</label>
            <br>
            <input class="form-check-input {{ $errors->first('roles') ? "is-invalid" : "" }}" type="checkbox"name="roles[]" id="ADMIN" value="ADMIN">
            <label for="ADMIN">Administrator</label>

            <input class="form-check-input {{ $errors->first('roles') ? "is-invalid" : "" }}" type="checkbox" name="roles[]" id="STAFF" value="STAFF">
            <label for="STAFF">Staff</label>

            <input class="form-check-input {{ $errors->first('roles') ? "is-invalid" : "" }}" type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER">
            <label for="CUSTOMER">Customer</label>
            <div class="invalid-feedback">
                {{ $errors->first('roles') }}
            </div>
            <br>

            <label for="phone">Phone Number</label><br>
            <input type="text" name="phone" id="phone" class="form-control {{ $errors->first('phone') ? "is-invalid" : "" }}" value="{{ old('phone') }}">
            <div class="invalid-feedback">
                {{ $errors->first('phone') }}
            </div>
            <br>

            <label for="address">Address</label>
            <textarea name="address" id="address" cols="30" rows="10" class="form-control {{ $errors->first('address') ? "is-invalid" : "" }}">{{ old('address') }}</textarea>
            <div class="invalid-feedback">
                {{ $errors->first('address') }}
            </div><br>

            <div id="app">
                <br>
                <label for="avatar">Avatar Image</label>
                <br>
            <input type="file" name="avatar" id="avatar" class="form-control {{ $errors->first('avatar') ? "is-invalid" : "" }}" @change="onFileChange">
                <br />
                <div class="preview">
                    <img :src="url" v-if="url" id="gmbr">
                </div>
                <div class="invalid-feedback">
                    {{ $errors->first('avatar') }}
                </div>
            </div>

            <hr class="my-3">

            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control {{ $errors->first('email') ? "is-invalid" : "" }}" placeholder="user@mail.com" value="{{ old('email') }}">
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
            <br>

            <label for="password">password</label><br>
            <input type="password" name="password" id="password" class="form-control {{ $errors->first('password') }}">
            <div class="invalid-feedback">
                {{ $errors->first('password') }}
            </div>
            <br>

            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control {{ $errors->first('password_confirmation') ? "is-invalid" : "" }}">
            <div class="invalid-feedback">
                {{ $errors->first('password_confirmation') }}
            </div>
            <br>

            {{-- <input type="submit" value="Save" class="btn btn-primary"> --}}
            <button type="submit" class="btn btn-success">Save <span class="oi oi-command"></span></button>

        </form>

    </div>

</div>
@endsection