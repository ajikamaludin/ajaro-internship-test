<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barang.index',[
            'barang' => Barang::orderBy('created_at','desc')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|max:8',
            'nama' => 'required|max:50',
            'deskripsi' => 'nullable',
            'stok' => 'required|numeric|digits_between:1,3',
            'harga' => 'required|numeric|digits_between:1,12',
            'berat' => 'required|numeric|digits_between:1,3',
        ]);

        if(Barang::create($request->input())){
            return redirect()->route('barang.index')->with(['msg' => 'Berhasil menambahkan barang', 'type' => 'success']);
        }else{
            return redirect()->route('barang.index')->with(['msg' => 'Terjadi kesalahan', 'type' => 'danger']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('barang.form', ['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode' => 'required|max:8',
            'nama' => 'required|max:50',
            'deskripsi' => 'nullable',
            'stok' => 'required|numeric|digits_between:1,3',
            'harga' => 'required|numeric|digits_between:1,12',
            'berat' => 'required|numeric|digits_between:1,3',
        ]);
        $barang->fill($request->input());
        if($barang->save()){
            return redirect()->route('barang.index')->with(['msg' => 'Berhasil mengedit barang', 'type' => 'success']);
        }else{
            return redirect()->route('barang.index')->with(['msg' => 'Terjadi kesalahan', 'type' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        if($barang->delete()){
            return redirect()->route('barang.index')->with(['msg' => 'Berhasil menghapus barang', 'type' => 'success']);
        }else{
            return redirect()->route('barang.index')->with(['msg' => 'Terjadi kesalahan', 'type' => 'danger']);
        }
    }
}
