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
                    <form action="{{ route('admin.pesanan.update',['id'=>$pesanans->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="pelanggan_id" class="form-label">Pelanggan</label>
                            <input type="number" class="form-control" name="pelanggan_id" placeholder="masukkan pelanggan_id" value="{{ old('pelanggan_id', $pesanans->pelanggan_id) }}">
                        </div>
                        <div class="mb-3">
                            <label for="jenispaket_id" class="form-label">Jenis paket</label>
                            <input type="number" class="form-control" name="jenispaket_id" placeholder="masukkan jenispaket_id" value="{{ old('jenispaket_id', $pesanans->jenispaket_id) }}">
                        </div>
                        <div class="mb-3">
                            <label for="item_id" class="form-label">Item</label>
                            <input type="number" class="form-control" name="item_id" placeholder="masukkan item_id" value="{{ old('item_id', $pesanans->item_id) }}">
                        </div>
                        <div class="">
                            <label for="total_harga" class="form-label">Total Harga</label>
                            <input type="number" class="form-control" name="total_harga" placeholder="masukkan total_harga" value="{{ old('total_harga', $pesanans->total_harga) }}">
                        </div>
                        <div class="">
                            <label for="tgl_acara" class="form-label">Tanggal Acara</label>
                            <input type="date" class="form-control" name="tgl_acara" placeholder="masukkan tgl acara" value="{{ old('tgl_acara', $pesanans->tgl_acara) }}">
                        </div>
                        <div class="mb-3">
                            <label for="jam_acara" class="form-label">Jam Acara</label>
                            <input type="time" class="form-control" name="jam_acara" placeholder="masukkan jam_acara" value="{{ old('jam_acara', $pesanans->jam_acara) }}">
                        </div>
                        <div class="mb-3">
                            <label for="lokasi_acara" class="form-label">Lokasi Acara</label>
                            <input type="text" class="form-control" name="lokasi_acara" placeholder="masukkan lokasi_acara" value="{{ old('lokasi_acara', $pesanans->lokasi_acara) }}">
                        </div>
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <input type="text" class="form-control" name="catatan" placeholder="masukkan catatan" value="{{ old('catatan', $pesanans->catatan) }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection