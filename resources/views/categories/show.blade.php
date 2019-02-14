@extends('layouts.global')

@section('title') Detail Category @endsection

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <label>Category Name</label><br>
                {{ $category->name }}
                <br><br>

                <label>Category Slug</label><br>
                {{ $category->slug }}
                <br><br>

                <label>Category Image</label><br>
                @if ($category->image)
                    <img src="{{ asset('storage/'. $category->image) }}" width="120px">
                @endif
            </div>
        </div>
    </div>
</div>

@endsection