@extends('admin.layout.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="text-center">Edit Item</h4>
                    @include('admin.layout.notif')
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.item.update',['id'=>$items->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_item" class="form-label">Nama item</label>
                            <input type="text" class="form-control" name="nama_item" placeholder="masukkan nama item" value="{{ old('nama_item', $items->nama_item) }}">
                        </div>
                        <div class="">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" placeholder="masukkan harga" value="{{ old('harga', $items->harga) }}">
                        </div>
                        <div class="">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stok" placeholder="masukkan stok" value="{{ old('stok', $items->stok) }}">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar" placeholder="masukkan gambar" value="{{ old('gambar', $items->gambar) }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection