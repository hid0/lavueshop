@extends('layouts.global')

@section('title') Create Book @endsection

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

        <form action="{{ route('books.store') }}" class="shadow-lg p-3 bg-white" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="title">Title</label><br>
            <input type="text" id="title" class="form-control {{ $errors->first('title') ? "is-invalid" : "" }}" name="title" placeholder="Book title" value="{{ old('title') }}">
            <div class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
            <br>

            <label for="cover">Cover</label><br>
            <input type="file" name="cover" id="cover" class="form-control {{ $errors->first('cover') ? "is-invalid" : "" }}" value="{{ old('cover') }}">
            <div class="invalid-feedback">
                {{ $errors->first('cover') }}
            </div>
            <br>

            <label for="desc">Description</label><br>
            <textarea name="description" id="desc" cols="30" rows="10" placeholder="Give a description about this book" class="form-control {{ $errors->first('description') ? "is-invalid" : "" }}">{{ old('description') }}</textarea>
            <div class="invalid-feedback">
                {{ $errors->first('description') }}
            </div>
            <br>

            <label for="categories">Categories</label><br>
            <select name="categories[]" multiple id="categories" class="form-control"></select>
            <br><br>

            <label for="stock">Stock</label><br>
            <input type="number" name="stock" id="stock" class="form-control {{ $errors->first('stock') ? "is-invalid" : "" }}" value="{{ old('stock') }}"><br>

            <label for="author">Author</label><br>
            <input type="text" name="author" placeholder="Book Author" id="author" class="form-control {{ $errors->first('author') ? "is-invalid" : "" }}" value="{{ old('author') }}"><br>

            <label for="publisher">Publisher</label><br>
            <input type="text" name="publisher" placeholder="Book Publisher" id="publisher" class="form-control {{ $errors->first('publisher') ? "is-invalid" : "" }}" value="{{ old('publisher') }}"><br>

            <label for="price">Price</label><br>
            <input type="number" name="price" id="price" class="form-control {{ $errors->first('price') ? "is-invalid" : "" }}" value="{{ old('price') }}"><br>

            <button class="btn btn-primary" name="save_action" value="PUBLISH">Publish</button>

            <button class="btn btn-secondary" name="save_action" value="DRAFT">Save as draft</button>

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
                results: data.map(function(item){return {id: item.id, text: item.name} })
            }
        }
    }
});
</script>
@endsection