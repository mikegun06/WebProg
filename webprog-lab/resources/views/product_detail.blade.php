@extends('welcome')

@section('container')
<div class="judul p-1 mb-2" style="background-color: grey; color: white">
    <h3>Product Detail</h3>
</div>
<div class="col">`
    @foreach ($product_detail as $pd)
    <div class="card">
        <img src="{{ $pd->image }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $pd->title }}</h5>
            <h5 class="card-title">{{ $pd->author }}</h5>
            <h5 class="card-title">{{ $pd->publisher }}</h5>
            <h5 class="card-title">{{ $pd->year }}</h5>
            <p class="card-text">{{ $pd->synopsis }}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection