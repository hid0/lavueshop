@extends('layouts.global')

@section('title') List of Books @endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('books.index') }}">
                    <div class="input-group">
                        <input type="text" name="keyword" placeholder="Filter by title" class="form-control">
                        <div class="input-group-append">
                            {{-- <input type="submit" value="Filter" class="btn btn-primary"> --}}
                            <button type="submit" class="btn btn-primary">Filter <span class="oi oi-magnifying-glass"></span></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a href="{{ route('books.create') }}" class="nav-link btn btn-info btn-sm"><span class="oi oi-plus"></span> Book</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('books.trash') }}" class="nav-link btn btn-info btn-sm"><span class="oi oi-aperture"></span> Trash</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('books.index') }}" class="nav-link {{ Request::get('status') == NULL &&Request::path() == 'books' ? 'active' : '' }}">All</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('books.index', ['status' => 'publish']) }}" class="nav-link {{ Request::get('status') == 'publish' ? 'active' :'' }} }}">Publish</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('books.index', ['status' => 'draft']) }}" class="nav-link {{ Request::get('status') == 'draft' ? 'active' :'' }} }}">Draft</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="my-3">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        {{-- <div class="row mb-3">
            <div class="col-md-12 text-left">
            </div>
        </div><br> --}}
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Categories</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>
                        @if($book->cover)
                        <img src="{{ asset('storage/'. $book->cover) }}" width="96px">
                        @endif
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        @if ($book->status == 'DRAFT')
                        <span class="badge bg-dark text-white">{{ $book->status }}</span>
                        @else
                        <span class="badge badge-success">{{ $book->status }}</span>
                        @endif
                    </td>
                    <td>
                        <ul class="pl-3">
                            @foreach ($book->categories as $category)
                            <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $book->stock }}</td>
                    <td>{{ $book->price }}</td>
                    <td>
                        <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn btn-info btn-sm"><span class="oi oi-pencil"></span></a>
                        <form action="{{ route('books.destroy', ['id' => $book->id]) }}" method="POST" onsubmit="return confirm('Move book to trash?')" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm" value="Trash"><span class="oi oi-trash"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="10">
                        {{ $books->appends(Request::all())->links() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection