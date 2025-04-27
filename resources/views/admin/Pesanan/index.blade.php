@extends('admin.layout.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="text-center">Pesanan</h4>
                    <div class="d-flex justify-content-between">
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Pesanan
                        </button>
                         {{-- searching --}}
                         <form action="{{ route('admin.pesanan.index') }}" method="get">
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
                                    <th>Pelanggan</th>
                                    <th>Jenispaket</th>
                                    <th>Item</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal Acara</th>
                                    <th>Jam Acara</th>
                                    <th>Lokasi Acara</th>
                                    <th>Catatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($pesanans as $pesanan )
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $pesanan->pelanggan_id }}</td>
                                        <td>{{ $pesanan->jenispaket_id }}</td>
                                        <td>{{ $pesanan->item_id }}</td>
                                        <td>{{ number_format($pesanan->total_harga) }}</td>
                                        <td>{{ $pesanan->tgl_acara }}</td>
                                        <td>{{ $pesanan->jam_acara }}</td>
                                        <td>{{ $pesanan->lokasi_acara}}</td>
                                        <td>{{ $pesanan->catatan }}</td>
                                        <td nowrap>
                                            <a href="{{ route('admin.pesanan.edit',['id'=>$pesanan->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('admin.pesanan.destroy',['id'=>$pesanan->id]) }}" method="post" class="d-inline-block" onsubmit="return confirm('Yakin Ingin Hapus Data Ini?')">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('admin.layout.notif')
                    <form action="{{ route('admin.pesanan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="pelanggan_id" class="form-label">Pelanggan</label>
                            <input type="number" class="form-control" name="pelanggan_id" placeholder="masukkan pelanggan_id">
                        </div>
                        <div class="mb-3">
                            <label for="jenispaket_id" class="form-label">Jenis Paket</label>
                            <select name="jenispaket_id" class="form-control">
                                <option value="">Pilih jenis paket</option>
                                @foreach($jenispakets as $items)
                                <option value="{{ $items->id }}">{{ $items->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--  <div class="mb-3">
                            <label for="item_id" class="form-label">Item </label>
                            <select name="item_id" class="form-control">
                                    <option value="">Pilih item</option>
                                    @foreach($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_item }}</option>
                                    @endforeach
                            </select>
                        </div>  --}}
                        <div class="">
                            <label for="total_harga" class="form-label">Total Harga</label>
                            <input type="number" class="form-control" name="total_harga" placeholder="masukkan total harga">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_acara" class="form-label">Tanggal Acara</label>
                            <input type="date" class="form-control" name="tgl_acara" placeholder="masukkan tgl acara">
                        </div>
                        <div class="mb-3">
                            <label for="jam_acara" class="form-label">Jam Acara</label>
                            <input type="time" class="form-control" name="jam_acara" placeholder="masukkan jam acara">
                        </div>
                        <div class="mb-3">
                            <label for="lokasi_acara" class="form-label">Lokasi Acara</label>
                            <input type="text" class="form-control" name="lokasi" placeholder="masukkan lokasi acara">
                        </div>
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <input type="text" class="form-control" name="catatan" placeholder="masukkan catatan">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Simpan</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection