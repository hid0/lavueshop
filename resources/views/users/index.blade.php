@extends('layouts.global')

@section('title')
    User List
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{ route('users.index') }}">
        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control" name="keyword" value="{{ Request::get('keyword') }}" placeholder="Filter Berdasarkan Email">
            </div>
            <div class="col-md-4">
                <input {{ Request::get('status') == 'ACTIVE' ? 'checked' : '' }} type="radio" name="status" value="ACTIVE" id="active" class="form-control">
                <label for="active">Active</label>

                <input {{ Request::get('status') == 'INACTIVE' ? 'checked' : '' }} type="radio" name="status" value="INACTIVE" id="inactive" class="form-control">
                <label for="inactive">Inactive</label>

                {{-- <input type="submit" value="Filter" class="btn btn-primary"> --}}
                <button type="submit" class="btn btn-primary">Filter <span class="oi oi-magnifying-glass"></span></button>
            </div>
            <div class="col-md-2">
                <a href="{{route('users.create')}}" class="btn btn-primary">Create User</a>
            </div>
        </div>
    </form>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><b>Name</b></th>
                <th><b>Username</b></th>
                <th><b>Email</b></th>
                <th><b>Avatar</b></th>
                <th><b>Status</b></th>
                <th><b>Action</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>{{$u->name}}</td>
                    <td>{{$u->username}}</td>
                    <td>{{$u->email}}</td>
                    <td>
                        @if ($u->avatar)
                            <img src="{{asset('storage/'.$u->avatar)}}" width="70px;" alt="">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($u->status == "ACTIVE")
                            <span class="badge badge-success">
                                {{ $u->status }}
                            </span>
                        @else
                            <span class="badge badge-danger">
                                {{ $u->status }}
                            </span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('users.show',['id'=>$u->id])}}" class="btn btn-info btn-sm">
                            <span class="oi oi-eye"></span>
                        </a>
                        <a href="{{route('users.edit',['id'=>$u->id])}}" class="btn btn-warning btn-sm text-white">
                            <span class="oi oi-pencil"></span>
                        </a>
                        <form action="{{route('users.destroy', ['id' => $u->id])}}" class="d-inline" method="POST" onsubmit="return confirm('Delete this user permanently?')">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            {{-- <input type="submit" value="Delete" class="btn btn-danger btn-sm"> --}}
                            <button type="submit" class="btn btn-danger btn-sm">
                                <span class="oi oi-trash"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tfoot>
                <tr>
                    <td colspan="10">
                        {{$users->links()}}
                    </td>
                </tr>
            </tfoot>
        </tbody>
    </table>
@endsection