
@extends('layouts.layouthome')
@section('container')
<div class="container-product">
    <div class="row justify-content-center">
        <div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('searchProduct') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type= "text" class="form-control" placeholder="search.." name="search">
                            <button class="btn btn-danger" type="submit">Cari</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        @if($products->count() == 0)
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tidak ada produk</h5>
                </div>
            </div>
        </div>
        @endif
        @foreach($products as $product)
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top"  src="{{ asset('storage/'.$product->image) }}" alt="profile Pic" height="380" width="200">
              <div class="card-body">
                <p class="card-text">{{ $product->name }}</p>
                <p class="card-text">{{ $product->category }}</p>
                @php
                  $angka = $product->price;
                  $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
                @endphp
                <p class="card-text">{{ $hasil_rupiah }}</p>
                <p class="card-text">Stock {{ $product->quantity }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <p class="btn-holder"><a href="{{ route('addToCart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Tambah ke keranjang</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

      </div>
    </div>
    


  </div>
@endsection
