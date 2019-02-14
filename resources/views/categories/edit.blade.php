@extends('layouts.global')

@section('title') Edit Category @endsection

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

    <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST" class="bg-white shadow-sm p-3" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="_method" value="PUT">

        <label>Category Name</label>
        <input type="text" name="name" class="form-control {{ $errors->first('slug') ? "is-invalid" : "" }}" value="{{ old('name') ? old('name') : $category->name }}">
        <br><br>

        <label>Category Slug</label>
        <input type="text" name="slug" value="{{ old('slug') ? old('slug') : $category->slug }}" class="form-control {{ $errors->first('slug') ? "is-invalid" : "" }}">
        <br><br>

        @if ($category->image)
            <span>Current Image</span><br />
            <img src="{{ asset('storage/'. $category->image) }}" width="200">
            <br><br>
        @endif

        <input type="file" name="image" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
        <div class="invalid-feedback">
            {{ $errors->first('image') }}
        </div>
        <br><br>

        <input type="submit" value="Update" class="btn btn-primary">

    </form>
</div>

@endsection

