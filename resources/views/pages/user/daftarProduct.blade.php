@extends('layout.user.user')
@section('content')

@include('parts.user.navbar')

<section id="Recommendations" class="mt-3">
    <div class="container">
        <div class="headline mt-4">
          <div class="row">
            <div class="col-lg-8">
              <h1 class="title-article">daftar produk kami</h1>
              <hr align="left">
            </div>
            <div class="col-lg-4 ">
                <form class="form-inline search-form d-flex justify-content-end " action="" method="get">
                  <input class="form-control me-sm-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">search</button>
                </form>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
        @foreach($daftarProduct as $dp)
          <div
            class="figure col-sm-12 col-md-6 col-lg-3 d-flex justify-content-center mb-3"
          >
            <a href="/products/{{$dp -> id}}" style="text-decoration: none"
              ><center>
                <img
                  src="{{ asset ('storage/images/'.$dp -> product_image) }}"
                  alt="{{$dp -> product_name}}"
                />
              </center>
              <h1 class="namaFigure fw-medium mt-2">
                {{$dp -> product_name}}
                <span style="font-weight: 700; color: #9a7b41"
                  >({{$dp -> product_status}})</span
                >
              </h1>
              <h3 class="hargaFigure mt-3 fw-bold">Rp. {{number_format($dp -> product_price,0)}}</h3>
            </a>
          </div>
          @endforeach
        </div>
        </div>
      </div>
    </section>
@include('parts.user.footer')
@endsection