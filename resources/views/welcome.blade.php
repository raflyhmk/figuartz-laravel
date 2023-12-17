@extends('layout.user.user')
@section('content')

@include('parts.user.navbar')

<!-- carousel header -->
    <section id="header" class="mb-3">
      <div
        id="carouselExampleInterval"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="2000">
            <img
              src="{{url ('assets/user/image/slide 1.png')}}"
              class="d-block w-100"
              alt="jual action figure"
            />
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img
              src="{{url ('assets/user/image/slide 2.png')}}"
              class="d-block w-100"
              alt="jual gundam model kit"
            />
          </div>
          <div class="carousel-item">
            <img
              src="{{url ('assets/user/image/slide 3.png')}}"
              class="d-block w-100"
              alt="jual nendoroid"
            />
          </div>
          <div class="carousel-item">
            <img
              src="{{url ('assets/user/image/slide 4.png')}}"
              class="d-block w-100"
              alt="jual replika senjata"
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleInterval"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleInterval"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!-- end carousel header -->

    <!-- video profile -->
    <div class="container videoProfile">
      <center>
        <h1 class="title">video profile</h1>

        <iframe
          src="https://www.youtube.com/embed/9mX1rdTIbRs"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
          class="mt-2 mb-4"
        ></iframe>
      </center>
    </div>
    <!-- end video profile -->

    <!-- card produk -->
    <section id="listProduk">
      <div class="container">
        <div class="row">
          <div
            class="col-sm-12 col-md-6 col-lg-3 d-flex justify-content-center mb-3"
          >
            <a href="#"><img src="{{url ('assets/user/image/figure.jpg')}}" alt="action figure" /></a>
          </div>
          <div
            class="col-sm-12 col-md-6 col-lg-3 d-flex justify-content-center mb-3"
          >
            <a href="#"><img src="{{url ('assets/user/image/nendoroid.jpg')}}" alt="nendoroid" /></a>
          </div>
          <div
            class="col-sm-12 col-md-6 col-lg-3 d-flex justify-content-center mb-3"
          >
            <a href="#"><img src="{{url ('assets/user/image/model kit.jpg')}}" alt="model kit" /></a>
          </div>
          <div
            class="col-sm-12 col-md-6 col-lg-3 d-flex justify-content-center mb-3"
          >
            <a href="#"
              ><img src="{{url ('assets/user/image/replika.jpg')}}" alt="weapon replika"
            /></a>
          </div>
        </div>
      </div>
    </section>
    <!-- end card produk -->

    <!-- rekomendasi -->
    <section id="Recommendations" class="mt-3">
      <center>
        <h1 class="title fw-bold">Top Recommendations</h1>
      </center>
      <div class="container mt-4">
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
        <center>
          <button
            type="button"
            class="btn btn-outline-primary btn-showAll mb-3" onclick="event.preventDefault(); location.href='{{ url('products') }}';"
          >
            Show All
          </button>
        </center>
      </div>
    </section>
    <!-- end rekomendasi -->

    <!-- google maps -->
    <div class="container maps">
      <center>
        <h1 class="title mt-4">
          Oni-chan pengen liat action figure secara langsung?
        </h1>
        <p class="descTitle">
          Oni-chan bisa mengunjungi toko kami secara langsung, lokasi kami bisa
          dilihat di maps yang ada di bawah ini.
        </p>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15810.575997353662!2d110.3970178!3d-7.8274513!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaad77b93e39dc1d2!2sAnigame!5e0!3m2!1sid!2sid!4v1666768849626!5m2!1sid!2sid"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="mb-4"
        ></iframe>
      </center>
    </div>
    <!-- end google maps -->
    
@include('parts.user.footer')

@endsection