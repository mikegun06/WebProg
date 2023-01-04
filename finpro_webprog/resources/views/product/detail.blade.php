@extends('layouts.main')

{{-- @section('css')
<style>
    #ProductImg {
        max-width: 400px;
        max-height: 500px;
        min-width: 400px;
        min-height: 500px;
    }

    .btn {
        border-radius: 15px;
        width: auto !important;
    }

</style>
@endsection --}}

@section('content')
{{-- percobaan --}}
<body class="bg-dark">
    <div class="container">
        <p class="btn mt-4"><a href="/">Back</a></p>
        {{-- detail --}}
        <div class="card col-12">
            <div class="row justify-content-center col-12">
              <div class="col-md-4">
                <img width="300px" height="400px" style="object-fit:cover" src="{{ asset('images/'.$data->photo) }}" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title mt-4">{{ $data->name }}</h3>
                  <div class="row">
                    <div class="col-sm-3">Detail</div>
                    <div class="col-sm-9">
                      <p>{{ $data->detail }}</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">Price</div>
                    <div class="col-sm-9">
                      <h4>Rp. {{ number_format($data->price) }}</h4>
                    </div>
                  </div>
                  @can('user')
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name='id' value="{{ $data->id }}">
                        <input type="hidden" name='price' value="{{ $data->price }}">
                        <input type="number" name='qty' value="1" min="1">
                        <p class="card-text"><small class="text-muted">Please re-check your items!</small></p>
                        <button type="submit" class="btn">Add To Cart</button>
                    </form>
                    @endcan
                </div>
              </div>
            </div>
          </div>
    </div>
</body>

@endsection
