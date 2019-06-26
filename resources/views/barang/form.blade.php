@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <h5 style="margin-bottom: 40px;">Input Data Barang</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="kode" class="col-3 col-form-label">Kode :</label>
                    <input type="text" name="kode" id="kode" class="form-control col-8" required value="{{ isset($barang) ? $barang->kode : old('kode') }}">
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-3 col-form-label">Nama :</label>
                    <input type="text" name="nama" id="nama" class="form-control col-8" required value="{{ isset($barang) ? $barang->nama : old('nama') }}">
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-3 col-form-label">Deskripsi :</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control col-8" required>{{ isset($barang) ? $barang->deskripsi : old('deskripsi') }}</textarea>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-3 col-form-label">Stok :</label>
                    <input type="number" name="stok" id="stok" class="form-control col-8" required value="{{ isset($barang) ? $barang->stok : old('stok') }}">
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-3 col-form-label">Harga :</label>
                    <input type="number" name="harga" id="harga" class="form-control col-8" required value="{{ isset($barang) ? $barang->harga : old('harga') }}">
                </div>
                <div class="form-group row">
                    <label for="berat" class="col-3 col-form-label">Berat :</label>
                    <input type="number" name="berat" id="berat" class="form-control col-4" required value="{{ isset($barang) ? $barang->berat : old('berat') }}">
                    <p class="keterangan">  gram</p>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <input type="submit" value="Tambah" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection