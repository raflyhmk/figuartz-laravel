<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function Dashboard(){
        $jumlahPengguna = User::all()->count();
        $jumlahProduct = Product::all()->count();
        $jumlahOrder = Order::all()->count();
        $keuntungan = Order::sum('product_price');
        return view('pages.admin.dashboard', compact(['jumlahPengguna', 'jumlahProduct', 'jumlahOrder', 'keuntungan']));
    }
    public function daftarProduk(){
        $daftarProduk = Product::all(); 
        return view('pages.admin.daftarProduk', compact('daftarProduk'));
    }
    public function tambahProduk(){
        return view('pages.admin.tambahProduk');
    }
    public function insertProduct(Request $request){
        $ekstensi = $request->file('product_image')->clientExtension();
        $nama = $request->product_name.'-'.now()->timestamp.'.'.$ekstensi;
        $request->file('product_image')->storeAs('images', $nama);
        $request['product_image'] = $nama;
        $insertProduct = Product::create([
            'product_name' => $request->product_name,
            'product_image' => $nama,
            'product_price' => $request->product_price,
            'product_series' => $request->product_series,
            'product_category' => $request->product_category,
            'product_manufacture' => $request->product_manufacture,
            'product_size' => $request->product_size,
            'product_status' => $request->product_status,
        ]);
        if($insertProduct){
            Session::flash('status', 'success');
            Session::flash('message', 'Produk berhasil ditambahkan');
            return redirect('/admin/daftarProduk');
        } else{
            Session::flash('status', 'failed');
            Session::flash('message', 'Produk gagal ditambahkan');
            return redirect('/admin/daftarProduk');
        }
    }
    public function editProduk(Request $request, $id){
        $editProduk = Product::find($id);
        return view('pages.admin.editProduk', compact('editProduk'));
    }
    public function updateProduct(Request $request, $id){
        $editProduk = Product::find($id);
        $ekstensi = $request->file('product_image')->clientExtension();
        $nama = 'product'.$request->product_name.'-'.now()->timestamp.'.'.$ekstensi;
        $request->file('product_image')->storeAs('images', $nama);
        $request['product_image'] = $nama;
        $editProduk->update([
            'product_name' => $request->product_name,
            'product_image' => $nama,
            'product_price' => $request->product_price,
            'product_series' => $request->product_series,
            'product_category' => $request->product_category,
            'product_manufacture' => $request->product_manufacture,
            'product_size' => $request->product_size,
            'product_status' => $request->product_status,
        ]);
        if($editProduk){
            Session::flash('status', 'success');
            Session::flash('message', 'Produk berhasil diperbarui');
            return redirect('/admin/daftarProduk');
        } else{
            Session::flash('status', 'failed');
            Session::flash('message', 'Produk gagal diperbarui');
            return redirect('/admin/daftarProduk');
        }
    }
    public function deleteProduct($id){
        $deleteProduct = Product::find($id);
        $deleteProduct->delete();
        if($deleteProduct){
            Session::flash('status', 'success');
            Session::flash('message', 'Produk berhasil dihapus');
            return redirect('/admin/daftarProduk');
        } else{
            Session::flash('status', 'failed');
            Session::flash('message', 'Produk gagal dihapus');
            return redirect('/admin/daftarProduk');
        }
    }
    
    public function daftarTransaksi(){
        $daftarTransaksi = Order::all();
        return view('pages.admin.daftarTransaksi', compact(['daftarTransaksi']));
    }
    public function konfirmasiPesanan(Request $request, $id){
        $konfirmasiPesanan = Order::find($id);
        return view('pages.admin.updateStatus', compact('konfirmasiPesanan'));
    }
    public function updateStatus(Request $request, $id){
        $updateStatus = Order::find($id);
        $updateStatus->update([
            'status_pesanan' => $request->status_pesanan, 
        ]);
        if($updateStatus){
            Session::flash('status', 'success');
            Session::flash('message', 'Pesanan berhasil di konfirmasi');
            return redirect('/admin/daftarTransaksi');
        } else{
            Session::flash('status', 'failed');
            Session::flash('message', 'Pesanan gagal di konfirmasi');
            return redirect('/admin/daftarTransaksi');
        }
    }
    public function listAdmin(){
        $listAdmin = Admin::all();
        return view('pages.admin.listAdmin', compact('listAdmin'));
    }
    public function listUser(){
        $listUser = User::all();
        return view('pages.admin.listUser', compact('listUser'));
    }
    public function tambahAdmin(){
        return view('pages.admin.tambahAdmin');
    }
    public function insertAdmin(Request $request){
        $request->validate([
            'password' => 'confirmed'
        ]);
        $existingUser = Admin::where('email', $request->email)->first();
        if ($existingUser) {
            return redirect()->back()->with('error', 'email sudah pernah terdaftar.');
        }
        
        $RegisterUser = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($RegisterUser) {
        return redirect('/admin/listAdmin');
    }
        return redirect()->back()->with('error', 'registrasi gagal.');
    }
    public function editAdmin($id)
    {
        $editAdmin = Admin::find($id);
        return view('pages.admin.editAdmin', compact('editAdmin'));
    }
    public function updateAdmin(Request $request, $id)
    {
        $updateAdmin = Admin::find($id);
        $dataToUpdate = [
        'name' => $request->name,
        'email' => $request->email,
        ];

        // Cek apakah password diisi atau tidak
        if ($request->filled('password')) {
            $dataToUpdate['password'] = Hash::make($request->password);
        }

        $updateAdmin->update($dataToUpdate);
        if ($updateAdmin) {
            Session::flash('status', 'success');
            Session::flash('message', 'Admin berhasil diperbarui');
            return redirect('/admin/listAdmin');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'Admin gagal diperbarui');
            return redirect('/admin/listAdmin');
        }
    }
    public function deleteAdmin($id)
    {
        $deleteAdminn = Admin::find($id);
        $deleteAdminn->delete();
        if ($deleteAdminn) {
            Session::flash('status', 'success');
            Session::flash('message', 'Admin berhasil dihapus');
            return redirect('/admin/listAdmin');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'Admin gagal dihapus');
            return redirect('/admin/listAdmin');
        }
    }
    public function editUser($id)
    {
        $editUser = User::find($id);
        return view('pages.admin.editUser', compact('editUser'));
    }
    public function updateUser(Request $request, $id)
    {
        $updateAdmin = User::find($id);
        $dataToUpdate = [
        'name' => $request->name,
        'email' => $request->email,
        ];

        // Cek apakah password diisi atau tidak
        if ($request->filled('password')) {
            $dataToUpdate['password'] = Hash::make($request->password);
        }

        $updateAdmin->update($dataToUpdate);
        if ($updateAdmin) {
            Session::flash('status', 'success');
            Session::flash('message', 'User berhasil diperbarui');
            return redirect('/admin/listUser');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'Admin gagal diperbarui');
            return redirect('/admin/listUser');
        }
    }
    public function deleteUser($id)
    {
        $deleteAdminn = User::find($id);
        $deleteAdminn->delete();
        if ($deleteAdminn) {
            Session::flash('status', 'success');
            Session::flash('message', 'User berhasil dihapus');
            return redirect('/admin/listUser');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'User gagal dihapus');
            return redirect('/admin/listUser');
        }
    }
}
