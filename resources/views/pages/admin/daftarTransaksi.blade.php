@extends('layout.admin.admin')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar transaksi</h1>
        <!-- alert success -->
         @if(Session::has('status') && Session::get('status') == 'success')
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <!-- alert failed -->
        @if(Session::has('status') && Session::get('status') == 'failed')
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{Session::get('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
              <div class="card-header py-3">
                <button type="button" class="btn btn-primary" onclick="event.preventDefault(); location.href='{{ url('admin/cetak-pesanan') }}';">
                    Cetak daftar pesanan
                  </button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                        <th>Nama pemesan</th>
                        <th>Email pemesan</th>
                        <th>Produk dipesan</th>
                        <th>Jumlah dipesan</th>
                        <th>Harga yang dibayar</th>
                        <th>opsi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nama pemesan</th>
                        <th>Email pemesan</th>
                        <th>Produk dipesan</th>
                        <th>Jumlah dipesan</th>
                        <th>Harga yang dibayar</th>
                        <th>opsi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        @foreach($daftarTransaksi as $dt)
                      <tr>
                        <td class="text-capitalize align-middle">{{$dt -> user -> name}}</td>
                        <td class="text-capitalize align-middle">{{$dt -> user-> email}}</td>
                        <td class="text-capitalize align-middle">{{$dt -> product -> product_name}}</td>
                        <td class="text-capitalize align-middle">{{$dt -> count}}</td>
                        <td class="align-middle">Rp{{number_format($dt -> product_price, 0)}}</td>
                        <td class="align-middle">
                            <a href="/admin/konfirmasi-pesanan/{{$dt -> id}}"class="btn btn-warning btn-circle btn-sm button-edit mr-1 mb-1"><i class="fas fa-edit"></i></a>
                        </td>  
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        <!-- delete modal -->

    </div>
@endsection