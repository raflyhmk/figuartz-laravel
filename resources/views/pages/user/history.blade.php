@extends('layout.user.user')
@section('content')

@include('parts.user.navbar')

<div class="container mt-3">
    <h1 class="fw-bold text-center mb-4">history pemesanan saya</h1>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Produk dipesan</th>
        <th scope="col">Jumlah pemesanan</th>
        <th scope="col">Harga produk</th>
        <th scope="col">status pesanan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($history as $key => $h)
        <tr>
        <th scope="row">{{ $key + 1 }}</th>
        <td>{{$h -> product_name}}</td>
        <td>{{$h -> count}}</td>
        <td>Rp. {{number_format($h -> product_price,0)}}</td>
        <td>{{$h -> status_pesanan}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>

@include('parts.user.footer')
@endsection