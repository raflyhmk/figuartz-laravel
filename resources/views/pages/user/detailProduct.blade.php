@extends('layout.user.user')
@section('content')

@include('parts.user.navbar')
    <div class="container mt-3 mb-5">
    <nav class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                Home
            </li>
            <li class="breadcrumb-item">
                Products
            </li>
            <li class="breadcrumb-item active">
                Details product {{$detailProducts -> product_name}}
            </li>
        </ol>
    </nav>
    <div class="row mt-4">
        <div class="col-6">
            <img src="{{ asset ('storage/images/'.$detailProducts -> product_image) }}" alt="{{$detailProducts -> product_name}}" width="100%"/>
        </div>
        <div class="col-6">
          <h3 class="namaFigure">
            {{$detailProducts -> product_name}}
          </h3>
          <h3 class="hargaProduk mt-3 fw-bold">Rp. {{number_format($detailProducts -> product_price,0)}}</h3>
          <p class="aboutProduk mt-3 fw-light">
            Nama Produk : {{$detailProducts -> product_name}}
          </p>
          <p class="aboutProduk mt-3 fw-light">
            Series : {{$detailProducts -> product_series}}   
          </p>
          <p class="aboutProduk mt-3 fw-light">
            Manufacturer : {{$detailProducts -> product_manufacture}} <br />
          </p>
          <p class="aboutProduk mt-3 fw-light">
            Tinggi : {{$detailProducts -> product_size}} cm
          </p>
          <hr />
        @guest
        <h1 class="fw-bold text-center">silahkan login terlebih dahulu untuk melakukan pemesanan</h1>
        @endguest


        @auth('web')
          @if (session('error'))
              <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif
          @if (session('success'))
              <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif
          <h3 class="namaFigure">
            Pesan sekarang
          </h3>
            <form action="" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$detailProducts -> product_price}}" name="product_price">
              <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$detailProducts -> product_name}}" name="product_name">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::user()->name}}" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email pemesan</label>
                <input type="email" class="form-control" id="exampleInputPassword1" value="{{Auth::user()->email}}" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">No Handphone pemesan</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="phone_number">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Jumlah dipesan</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="count">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Upload bukti transfer</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="bukt_transfer">
                <div id="emailHelp" class="form-text">transfer ke nomor rekening 21211212 BCA.</div>
            </div>
            <button type="submit" class="btn btn-primary btn-login">Submit</button>
            </form>
        @endauth
        </div>
    </div>
    </div>
@include('parts.user.footer')
@endsection