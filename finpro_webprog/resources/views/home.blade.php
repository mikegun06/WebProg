@php
$a = 0;
@endphp

@extends('layouts.main')

@section('content')
<body class="bg-dark">
    {{-- search --}}
    <div class="container">
        <div class="row mt-4 p-0">
            <div class="col-11 mr-2 p-0">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <div class="col-1 px-2">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                    </div>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="container my-4">
        @foreach ($categories as $cat)
        <div class="row justify-content-center my-2">
          <div class="card col-12 p-0">
            <div class="card-header">
                {{ $cat }} <a href="#">View All</a>
            </div>
            <div class="card-deck my-4 mx-auto">
                @foreach($products->slice(0,3) as $pro)
                <div class="card" onclick="location.href={{ route('product_detail', ['id'=>$pro->id]) }};">
                    <a href="{{ route('product_detail', ['id'=>$pro->id]) }}">
                        <img width="340px" style="object-fit: cover" src="{{ asset('images/'.$pro->photo) }}">
                    </a>
                <div class="card-body">
                  <h5 class="card-title">{{ $pro->name }}</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p>Rp. {{ number_format($pro->price) }}</p>
                    </div>
                </div>
                @endforeach
          </div>
        </div>
      </div>
      @endforeach

</body>
@endsection

@if (Session::has('success-register'))

@section('js')
<script>
    Swal.fire({
        title: 'Success',
        text: "Successfully Registered",
        icon: 'success',
        confirmButtonText: 'Ok'
    })

</script>
@endsection
@endif
