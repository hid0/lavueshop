@extends('layouts.global')

@section('title') Edit Book @endsection

@section('content')

<div class="row">
    <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
                <button class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{ route('books.update', ['id' => $book->id]) }}" method="POST" enctype="multipart/form-data" class="p-3 shadow-lg bg-white">

            @csrf

            <input type="hidden" name="_method" value="PUT">

            <label for="title">Title</label><br>
            <input type="text" name="title" value="{{ $book->title }}" id="title" class="form-control"><br>

            <label for="cover">Cover</label><br>
            <small class="text-muted">Current Cover</small><br>
            @if ($book->cover)
                <img src="{{ asset('storage/'. $book->cover) }}" width="96px">
            @endif
            <br><br>
            <input type="file" name="cover" id="cover" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>
            <br><br>

            <label for="slug">Slug</label><br>
            <input type="text" name="slug" placeholder="enter-a-slug" id="slug" class="form-control" value="{{ $book->slug }}"><br>

            <label for="desc">Description</label><br>
            <textarea name="description" id="desc" cols="30" rows="10" class="form-control">{{ $book->description }}</textarea><br>

            <label for="categories">Categories</label><br>
            <select name="categories[]" id="categories" class="form-control" multiple></select><br><br>

            <label for="stock">Stock</label><br>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $book->stock }}"><br>

            <label for="author">Author</label><br>
            <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}"><br>

            <label for="publisher">Publisher</label><br>
            <input type="text" name="publisher" id="publisher" class="form-control" value="{{ $book->publisher }}"><br>

            <label for="price">Price</label><br>
            <input type="number" name="price" id="price" class="form-control" value="{{ $book->price }}"><br>

            <label for="status">Status</label><br>
            <select name="status" id="status" class="form-control">
                <option {{ $book->status == 'PUBLISH' ? 'selected' : '' }} value="PUBLISH">PUBLISH</option>
                <option {{ $book->status == 'DRAFT' ? 'selected' : '' }} value="DRAFT">DRAFT</option>
            </select><br>

            <button class="btn btn-primary" value="PUBLISH"><span class="oi oi-update"></span> Update</button>

        </form>
    </div>
</div>

@endsection
@section('footer-script')
<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
<script src="{{asset('assets/js/select2.min.js')}}"></script>
<script>
$('#categories').select2({
    ajax: {
        url: 'http://lavue.shop/ajax/categories/search',
        processResults: function (data) {
            return {
                results: data.map(function(item)
                {
                    return {
                        id: item.id,
                        text: item.name
                    }
                })
            }
        }
    }
});

var categories = {!! $book->categories !!}

    categories.forEach(function (category) {
        var option = new Option(category.name, category.id, true, true);
        $('#categories').append(option).trigger('change');
    })

</script>
@endsection