@extends('admin.layout.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="text-center">Jenis paket</h4>
                    <div class="d-flex justify-content-between">
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Jenis paket
                        </button>
                         {{-- searching --}}
                         <form action="{{ route('admin.jenispaket.index') }}" method="get">
                            <div class="input-group">
                                <input type="text" id="searchInput" class="form-control" name="search" value="{{ request('search') }}" placeholder="masukkan kata kunci" oninput="this.form.submit()">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm">
                            <thead class="text-center">
                                <tr>
                                    <th>NO</th>
                                    <th>Nama paket</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($jenispakets as $item )
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $item->nama_paket }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="" width="100">
                                        </td>
                                        <td>{{ number_format($item->harga) }}</td>
                                        <td nowrap>
                                            <a href="{{ route('admin.jenispaket.edit',['id'=>$item->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('admin.jenispaket.destroy',['id'=>$item->id]) }}" method="post" class="d-inline-block" onsubmit="return confirm('Yakin Ingin Hapus Data Ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{--  {{ $bus->links() }}  --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jenis paket</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('admin.layout.notif')
                    <form action="{{ route('admin.jenispaket.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_paket" class="form-label">Nama paket</label>
                            <input type="text" class="form-control" name="nama_paket" placeholder="masukkan nama paket">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" placeholder="masukkan deskripsi">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar" placeholder="masukkan gambar">
                        </div>
                        <div class="">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" placeholder="masukkan harga">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Simpan</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection