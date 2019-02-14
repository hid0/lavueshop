@extends('layouts.global')

@section('title') Trashed Categories @endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <form action="{{ route('categories.index') }}">
            <div class="input-group">
                <input type="text" name="name" placeholder="Filter by Category Name" value="{{ Request::get('name') }}" class="form-control">

                <div class="input-group-append">
                    <input type="submit" value="Filter" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link">Published</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.trash') }}" class="nav-link active">Trash</a>
            </li>
        </ul>
    </div>
</div>
<hr class="my-3">
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
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
                        <a href="{{ route('categories.restore', ['id' => $category->id]) }}" class="btn btn-success btn-sm"><i class="material-icons">restore</i></a>
                        <form action="{{ route('categories.delete-permanent', ['id' => $category->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Delete this category permanently?')">
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