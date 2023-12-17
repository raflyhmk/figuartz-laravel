@extends('layout.user.user')
@section('content')
<div class="container">
    <h1 class="text-center mt-5 mb-4">daftar pesanan</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama pemesan</th>
      <th scope="col">Email pemesan</th>
      <th scope="col">Produk yang dipesan</th>
      <th scope="col">Jumlah pemesanan</th>
      <th scope="col">Harga yang dibayar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cetakPesanan as $key => $cp)
    <tr>
      <th scope="row">{{ $key + 1 }}</th>
      <td>{{$cp -> user -> name}}</td>
      <td>{{$cp -> user -> email}}</td>
      <td>{{$cp -> product -> product_name}}</td>
      <td>{{$cp -> count}}</td>
      <td>Rp. {{number_format($cp -> product_price,0)}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<center><a href="" id="printPDF" target="_blank"><button type="button" class="btn btn-primary d-print-none"><i class="fa fa-print me-2" aria-hidden="true"></i>Cetak pdf</button></a></center>
</div>

<script>
    
    function printOnLoad() {
        window.print();
    }

    window.addEventListener('load', printOnLoad);

    document.getElementById("printPDF").addEventListener("click", function(event){
        event.preventDefault();
        window.print();
    });
</script>
@endsection