@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8">
        <h3>Data Barang</h3>
    </div>
    <div class="col-4 ">
        <a href="{{ route('barang.create') }}" class="btn btn-success float-right">Tambah</a>
    </div>
</div>
@if(session()->has('msg'))
<div class="row">
    <div class="col-12">
        <div class="alert alert-{{ session()->get('type') }}">
            {{ session()->get('msg') }}
        </div>
    </div>
</div>
@endif
<div class="row" style="margin-top:20px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>Kode</td>
                <td>Nama</td>
                <td>Harga</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $item)
            <tr>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama }}</td>
                <td>Rp. {{ $item->harga }}</td>
                <td style="width: 170px;">
                    <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
                        <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-link">Edit</a> 
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="btn btn-link red" onclick="return confirm('yakin hapus ?')">Hapus</button> 
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $barang->links() }}
</div>
    
@endsection