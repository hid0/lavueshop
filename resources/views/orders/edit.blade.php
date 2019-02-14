@extends('layouts.global')

@section('title') Edit Order @endsection
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

        <form action="{{ route('orders.update', ['id' => $order->id]) }}" class="shadow-sm bg-white p-3" method="POST">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <label for="invoice_number">Invoice Number</label><br>
            <input type="text" value="{{ $order->invoice_number }}" class="form-control" disabled>
            <br>

            <label for="buyer">Buyer</label>
            <input type="text" class="form-control" value="{{ $order->user->name }}" disabled>
            <br>

            <label for="created_at">Order Date</label><br>
            <input type="text" value="{{ $order->created_at }}" class="form-control" disabled>
            <br>

            <label for="">Books ({{ $order->totalQuantity }})</label><br>
            <ul>
            @foreach ($order->books as $book)
                <li><b>{{ $book->title }}</b>({{ $book->pivot->quantity }})</li>
            @endforeach
            </ul>

            <label for="">Total Price</label><br>
            <input type="text" class="form-control" value="{{ $order->total_price }}" disabled>

            <label for="status">Status</label><br>
            <select name="status" id="status" class="form-control">
                <option {{ $order->status == "" ? "selected" : "SUBMIT" }} value="SUBMIT">SUBMIT</option>
                <option {{ $order->status == "" ? "selected" : "PROCESS" }} value="PROCESS">PROCESS</option>
                <option {{ $order->status == "" ? "selected" : "FINISH" }} value="FINISH">FINISH</option>
                <option {{ $order->status == "" ? "selected" : "CANCEL" }} value="CANCEL">CANCEL</option>
            </select><br>

            <button type="submit" class="btn btn-primari">
                Update <span class="oi oi-share-boxed"></span>
            </button>

        </form>
    </div>
</div>

@endsection