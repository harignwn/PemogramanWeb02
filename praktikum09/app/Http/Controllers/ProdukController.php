<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\KategoriProduk;


class ProdukController extends Controller
{
    public function index()
    {
        // Jalanin fungsi getAllProduk dari model
        $produk = Produk::getAllProduk();

        // Mengirim data produk ke view 'admin.produk.produk'
        return view('produk', compact('produk'));
    }
    
    
    public function create()
    {
        $kategori_produk = KategoriProduk::all();
        $produk = Produk::all();
        return view('create', compact('kategori_produk', 'produk'));
    }
    public function store(Request $request)
    {
        //membuat tambah data
        //$produk -> kode = data produk dan nama dari database
        //$request -> $kode merupakan inputan dari form nya 
        $produk = new Produk;
        $produk->kode = $request->kode;
        $produk->nama = $request->nama;
        $produk->harga_jual = $request->harga_jual;
        $produk->harga_beli = $request->harga_beli;
        $produk->stok = $request->stok;
        $produk->min_stok = $request->min_stok;
        $produk->deskripsi = $request->deskripsi;
        $produk->kategori_produk_id = $request->kategori_produk_id;
        $produk->save(); // menyimpan data ke database
        return redirect('produk');//meredirect ke halaman produk

    }
    public function edit(string $id)
    {
        //arahkan ke halaman edit
        $kategori_produk = KategoriProduk::all();
        $produk = Produk::where('id', $id)->get();
        return view('edit', compact(
            'produk',
            'kategori_produk'
        ));
    }
    public function update(Request $request)
    {
        $produk = Produk::find($request->id);
        $produk->kode = $request->kode;
        $produk->nama = $request->nama;
        $produk->harga_jual = $request->harga_jual;
        $produk->harga_beli = $request->harga_beli;
        $produk->stok = $request->stok;
        $produk->min_stok = $request->min_stok;
        $produk->deskripsi = $request->deskripsi;
        $produk->kategori_produk_id = $request->kategori_produk_id;
        $produk->save();
        return redirect('produk');
    }
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return redirect('produk')->with('success', 'Produk berhasil dihapus');
    }

}
