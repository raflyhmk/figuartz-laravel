@extends('layout.admin.admin')

@section('content')
    <div class="container-fluid">
        <!-- insert form -->
        <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  Tambah Produk
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <form enctype="multipart/form-data" method="POST" action="" class="form-input" >
                    @csrf
                    <div class="mb-3">
                      <label for="inputNamaMobil" class="form-label">Nama produk</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="masukan nama paket..."
                        name="product_name"
                        required
                      />
                    </div>
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Foto produk</label>
                      <input type="file" class="form-control-file" name="product_image" required/>
                    </div>
                    <div class="mb-3">
                      <label for="inputNamaMobil" class="form-label">Harga produk</label>
                      <input
                        type="number"
                        class="form-control"
                        placeholder="masukan harga produk..."
                        name="product_price"
                        required
                      />
                    </div>    
                    <div class="mb-3">
                      <label for="inputMerk" class="form-label">Series produk</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Masukan series produk..."
                        name="product_series"
                        required
                      />
                    </div>
                    <div class="mb-3">
                      <label for="inputMerk" class="form-label">Kategori produk</label>
                      <select class="custom-select" name="product_category">
                        <option disabled selected value="">pilih kategori produk</option>
                        <option value="Action figure">Action figure</option>
                        <option value="Nendoroid">Nendoroid</option>
                        <option value="Model Kit">Model Kit</option>
                        <option value="Weapon replica">Weapon replica</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="inputMerk" class="form-label">Manufaktur produk</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Masukan manufaktur produk..."
                        name="product_manufacture"
                        required
                      />
                    </div>
                     <div class="mb-3">
                      <label for="inputMerk" class="form-label">Ukuran produk</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="masukan ukuran produk (dalam cm)..."
                        name="product_size"
                        required
                      />
                    </div>
                    <div class="form-outline">
                        <label class="form-label mb-3" for="nohp">Status produk</label><br>
                        <div class="form-check form-check-inline mb-3 ml-2">
                            <input class="form-check-input" type="radio" name="product_status" id="inlineRadio1" value="Ready stok" style="transform: scale(1.5);">
                            <label class="form-check-label ml-2" for="inlineRadio1">Ready stok</label>
                        </div>
                        <div class="form-check form-check-inline mb-3 ml-2">
                            <input class="form-check-input" type="radio" name="product_status" id="inlineRadio2" value="Pre order" style="transform: scale(1.5);">
                            <label class="form-check-label ml-2" for="inlineRadio2">Pre order</label>
                        </div>
                  </div>
                    
                    <div class="mb-3">
                      <button type="submit" class="btn btn-primary" name="btn-insert">Tambahkan Produk</button>
                    </div>
                  </form>               
                </div>
              </div>
        </div>
    </div>
@endsection