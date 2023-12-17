<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function products(Request $request){
        $cari = $request->cari;
        $allData = Product::count();
        $daftarProduct = Product::where('Product_name', 'LIKE', '%'. $cari. '%')
        ->orWhere('Product_series', $cari)
        ->paginate($allData);
        return view('pages.user.daftarProduct', compact(['daftarProduct']));
    }
    public function detailProducts($id){
        $detailProducts = Product::find($id);
        return view('pages.user.detailProduct', compact(['detailProducts']));
    }
    public function orderProducts(Request $request){
        $ekstensi = $request->file('bukt_transfer')->clientExtension();
        $nama = $request->name.'-'.now()->timestamp.'.'.$ekstensi;
        $request->file('bukt_transfer')->storeAs('images', $nama);
        $request['bukt_transfer'] = $nama;

        // Hitung total harga berdasarkan jumlah pemesanan
        $total_harga = $request->product_price * $request->count;
        $insertProduct = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'count' => $request->count,
            'bukti_transfer' => $nama,
            'product_name' => $request->product_name,
            'product_price' => $total_harga,
            'status_pesanan' => 'pending',
        ]);
        if($insertProduct){
           return redirect()->back()->with('success', 'pesanan berhasil dibuat.');
        } else{
            return redirect()->back()->with('error', 'pesanan gagal dibuat.');
        }
    }
    public function history(){
        $history = Order::where('email', Auth::user()->email)->get();
        return view('pages.user.history', compact(['history']));
    }
}
