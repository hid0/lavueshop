@extends('layouts.global')

@section('title') Create Category @endsection

@section('content')

<div class="row">
    <div class="col-md-12">


        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST" class="bg-white shadow-sm p-3" enctype="multipart/form-data">

            @csrf

            <label>Category Name</label>
            <input type="text" class="form-control {{ $errors->first('name') ? "is-invalid" : "" }}" name="name">
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            <br />

            <label>Category Image</label>
            <input type="file" class="form-control {{ $errors->first('image') ? "is-invalid" : "" }}" name="image">
            <div class="invalid-feedback">
                {{ $errors->first('image') }}
            </div>
            <br />

            <input type="submit" value="Save" class="btn btn-primary">

        </form>


    </div>
</div>

@endsection