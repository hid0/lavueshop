@extends('layouts.global')

@section('title')
    Edit User
@endsection

@section('content')

<div class="col-md-8">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{route('users.update', ['id' => $user->id])}}" class="bg-white shadow-sm p-3" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <label for="name">Name</label><br />
        <input type="text" name="name" id="name" class="form-control {{ $errors->first('name') ? "is-invalid" : "" }}" value="{{ old('name') ? old('name') : $user->name }}">
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
        <br />

        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="{{$user->username}}" disabled>
        <br>

        <label for="">Status</label><br>
        <input type="radio" name="status" id="active" class="form-check-input" {{$user->status == "ACTIVE" ? "checked" : ""}} value="Active">
        <label for="active">ACTIVE</label>

        <input type="radio" name="status" id="inactive" class="form-check-input" {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE">
        <label for="inactive">Inactive</label>
        <br />

        <label for="">Roles</label><br>
        <input class="form-check-input {{ $errors->first('roles') ? "is-invalid" : "" }}" type="checkbox" name="roles[]" id="ADMIN" value="ADMIN" {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}}>
        <label for="ADMIN">Administrator</label>

        <input class="form-check-input {{ $errors->first('roles') ? "is-invalid" : "" }}" type="checkbox" name="roles[]" id="STAFF" value="STAFF" {{in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}}>
        <label for="STAFF">Staff</label>

        <input class="form-check-input {{ $errors->first('roles') ? "is-invalid" : "" }}" type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER" {{in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : ""}}>
        <label for="CUSTOMER">Customer</label>
        <div class="invalid-feedback">
            {{ $errors->first('roles') }}
        </div>
        <br>

        <label for="phone">Phone</label>
        <br>
        <input type="text" name="phone" value="{{ old('phone') ? old('phone') : $user->phone }}" class="form-control {{ $errors->first('phone') ? "is-invalid" : "" }}">
        <div class="invalid-feedback">
            {{ $errors->first('phone') }}
        </div>
        <br>

        <label for="address">Address</label>
        <textarea name="address" id="address" cols="30" rows="10" class="form-control {{ $errors->first('address') ? "is-invalid" : "" }}">{{ old('address') ? old('address') : $user->address }}</textarea>
        <br>

        <label for="avatar">Avatar</label>
        <br>
        Current avatar: <br>
        @if ($user->avatar)
            <img src="{{ asset('storage/'.$user->avatar) }}" alt="" width="120px">
        @else
            No avatar
        @endif
        <br>
        <input type="file" name="avatar" id="avatar" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>

        <hr class="my-3">

        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control {{ $errors->first('email') ? "is-invalid" : "" }}" placeholder="user@mail.com" value="{{ $user->email}}" disabled>
        <div class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
        <br>

        {{-- <input type="submit" value="Save" class="btn btn-warning"> --}}
        <button type="submit" class="btn btn-danger">Save <span class="oi oi-pin"></span></button>

    </form>
</div>
@endsection