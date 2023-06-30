@extends('admin.layout.appadmin')
@section('content')
@if (Auth::user()->role != 'pelanggan')
{{-- Disini Isi Konten --}}
@else
@include('admin.layout.accesdenied')
@endif
@if (Auth::user()->role == 'admin')
	<a class="btn btn-primary" href="{{ url('produk/create') }}">Create</a>
@endif

// Kedua : Batasi tombol delete hanya untuk admin
@if (Auth::user()->role == 'admin')
	<a href="{{ url('produk/delete/' . $p->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk?')">Delete</a>
@endif
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a target="_blank" href="https://datatables.net/">official DataTables</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ url('produk/create') }}">Create</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Stok</th>
                        <th>Minimal Stok</th>
                        <th>Deskripsi</th>
                        <th>Kategori Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Stok</th>
                        <th>Minimal Stok</th>
                        <th>Deskripsi</th>
                        <th>Kategori Produk</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($produk as $p)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $p->kode }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->harga_jual }}</td>
                            <td>{{ $p->harga_beli }}</td>
                            <td>{{ $p->stok }}</td>
                            <td>{{ $p->min_stok }}</td>
                            <td>{{ $p->deskripsi }}</td>
														{{--  <td>{{ $p->kategori_produk_id }}</td> --}}
                            <td>{{ $p->nama_kategori }}</td>
                            {{-- nama_kategori diambil dari join yang ada di controller produk yang sudah dibuatkan join --}}

                            <td>
                                <td><a href="{{ url('produk/edit/' . $p->id) }}" class="btn btn-warning">Edit</a> 
                                     <a href="{{ url('produk/delete/' . $p->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk?')">Delete</a></td> 
                            </td>
                        </tr>
                        @php $no++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection