@extends('layouts.global')

@section('title') List of Category @endsection

@section('content')
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('status')}}
        <button class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
<div class="row">
    <div class="col-md-6">
        <form accept="{{ route('categories.index') }}">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Filter by category" name="name" />
                <div class="input-group-append">
                    {{-- <input type="submit" value="Filter" class="btn btn-primary" /> --}}
                    <button type="submit" class="btn btn-primary">Filter <span class="oi oi-magnifying-glass"></span></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link active">Published</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.trash') }}" class="nav-link">Trash</a>
            </li>
        </ul>
    </div>
</div>
<hr class="my-3">
<div class="row">
    <div class="col-md-12">
        <div class="right-text mr-auto">
            <a href="{{ route('categories.create') }}" class="btn btn-info">Create Category</a>
        </div><br />
        <table class="table table-bordered table-stripped table-hover">
            <thead>
                <tr>
                    <th><b>Name</b></th>
                    <th><b>Slug</b></th>
                    <th><b>Image</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        @if ($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="" width="48px" />
                        @else
                            N Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>
                        <a href="{{ route('categories.show', ['id' => $category->id]) }}" class="btn btn-primary btn-sm"><i class="material-icons">details</i></a>
                        <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Move category to trash?')">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="10">
                        {{ $categories->appends(Request::all())->links() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection