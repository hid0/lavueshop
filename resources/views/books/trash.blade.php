@extends('layouts.global')

@section('title') Trashed of Books @endsection

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
        <div class="right-text mr-auto">
            <a href="{{ route('books.index') }}" class="btn btn-default btn-sm"><span class="oi oi-chevron-left"></span> Back</a>
        </div><br>
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
                        <form action="{{ route('books.restore', ['id' => $book->id]) }}" class="d-inline" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning" value="Restore"><span class="oi oi-loop"></span> Restore</button>
                        </form>
                        <form action="{{ route('books.delete-permanent', ['id' => $book->id]) }}" class="d-inline" onsubmit="return confirm('Delete this book permanently?')">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" title="Delete Permanen">
                                <span class="oi oi-power-standby"></span>
                            </button>
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