<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{

    

    public function show()
{
    $produk = Produk::orderBy('nama', 'asc')->get();
    return view('list_produk', compact('produk'));
}


    public function simpan(Request $request)
    {
        $produk = new Produk;
        $produk->nama    = $request->input('nama');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga = $request->input('harga');
        $produk->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

        public function delete($id){

        $produk = Produk::where('id', $id)->first();
        if ($produk) {
            $produk->delete();
            return redirect()->back()->with('success', 'Produk berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
{
    $produk = Produk::find($id);

    if ($produk) {
        $produk->nama = $request->input('nama');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga = $request->input('harga');
        $produk->save();

        return redirect()->back()->with('success', 'Produk berhasil diperbarui.');
    } else {
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }
}


}
