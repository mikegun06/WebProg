@extends('layout.layout')

@section('title', 'detail')
@section('content')
    @guest()
        <div class="fluid-container bg-white p-3 rounded-1 shadow" style="width: 75%">

            <div class="card flex-lg-row mx-auto align-items-center justify-content-center shadow-none" style="border: none;">
                <div class="image-container">
                    <img class="img-fluid image-left" src="{{ asset('storage/' . $products->photo) }}" width="400px" height="300px">
                </div>
                <div class="card-body detail-card-body">
                    <form>
                        <div class="row mb-3">
                            <h5 class="card-title detail-card-title">{{ $products->name }}</h5>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Detail</label>
                            <div class="col-sm-10">
                                <p class="card-text">{{ $products->description }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <p class="card-text">IDR {{ $products->price }}</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    @else
        <div class="fluid-container bg-white p-3 rounded-1 shadow" style="width: 75%">

            <div class="card flex-lg-row mx-auto align-items-center justify-content-center shadow-none" style="border: none;">
                <div class="image-container">
                    <img class="img-fluid image-left" src="{{ asset('storage/' . $products->photo) }}" width="400px"
                        height="300px">
                </div>
                <div class="card-body detail-card-body">
                    <form method="POST" action="/cart/{{ $products->id }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                        <div class="row mb-3">
                            <h5 class="card-title detail-card-title">{{ $products->name }}</h5>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Detail</label>
                            <div class="col-sm-10">
                                <p class="card-text">{{ $products->description }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <p class="card-text">IDR {{ $products->price }}</p>
                            </div>
                        </div>
                        @if (Auth::user()->role == 'user')
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Qty</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputQty" name="quantity">
                                </div>
                            </div>
                            <br>

                            <button type="submit" class="btn btn-outline-secondary">Add to Cart</button>
                        @endif

                    </form>
                </div>
            </div>

        </div>
    @endguest

@endsection
