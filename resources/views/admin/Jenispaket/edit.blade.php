@extends('admin.layout.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="text-center">Edit Jenis paket</h4>
                    @include('admin.layout.notif')
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.jenispaket.update',['id'=>$jenispakets->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_paket" class="form-label">Nama paket</label>
                            <input type="text" class="form-control" name="nama_paket" placeholder="masukkan nama paket" value="{{ old('nama_paket', $jenispakets->nama_paket) }}">
                        </div>
                        <div class="">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" placeholder="masukkan deskripsi" value="{{ old('deskripsi', $jenispakets->deskripsi) }}">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar" placeholder="masukkan gambar" value="{{ old('gambar', $jenispakets->gambar) }}">
                        </div>
                        <div class="">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" placeholder="masukkan harga" value="{{ old('harga', $jenispakets->harga) }}">
                        </div>
                       
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection