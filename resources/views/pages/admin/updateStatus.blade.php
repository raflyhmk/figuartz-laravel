@extends('layout.admin.admin')
@section('content')

<!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- page heading -->
           <h1 class="h3 mb-2 text-gray-800">Order atas nama {{$konfirmasiPesanan -> name}}</h1>
            <!-- insert form -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  <a href="/admin/daftarTransaksi">
                    <button type="button" class="btn btn-primary">
                    Kembali
                    </button>
                  </a>
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <form enctype="multipart/form-data" method="POST" action="" class="form-input" >
                    @method('put')
                    @csrf
                    <div class="mb-3">
                      <img src="{{ asset ('storage/images/'.$konfirmasiPesanan -> bukti_transfer) }}" alt="bukti transfer {{$konfirmasiPesanan -> name}}"  height="640px">
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                        <label for="exampleFormControlTextarea1">bukti transfer {{$konfirmasiPesanan -> name}}</label>
                        <select class="custom-select" name="status_pesanan">
                        <option disabled selected value="">pilih status konfirmasi</option>
                        <option value="pesanan dalam perjalanan" @if($konfirmasiPesanan -> status_pesanan == "pesanan dalam perjalanan") selected @endif>pesanan dalam perjalanan</option>
                        <option value="pending" @if($konfirmasiPesanan -> status_pesanan == "pending") selected @endif>pending</option>
                        <option value="ditolak" @if($konfirmasiPesanan -> status_pesanan == "ditolak") selected @endif>ditolak</option>
                      </select>
                    </div>
                    </div>
                    <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>               
                </div>
              </div>
            </div>
          </div>
<!-- end of begin page content -->

@endsection