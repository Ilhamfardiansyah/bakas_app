@extends('dashboard.layout.main')

@section('container')
<form action="post" action="/dashboard/edit">
    <div class="form-group col-md-4">
        <label for="barcode" class="form-label">barcode</label>
        <input type="number" class="form-control @error('barcode') is-invalid @enderror"
            id="barcode" name="barcode" value="{{ old('barcode', $post->barcode) }}" required autofocus>
        @error('barcode')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Data Suplaier</b></h3>
                </div>
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>PLU</th>
                                <th>Nama Barang</th>
                                <th>Barcode</th>
                                <th>Stok</th>
                                <th>Harga Satuan</th>
                                <th>Total Harga</th>
                                <th>Rak</th>
                                <th>Nama Suplaier</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $data)
                                <tr>
                                    <td>{{ $data->plu }}</td>
                                    <td>{{ $data->nama_barang }}</td>
                                    <td>{{ $data->barcode }}</td>
                                    <td>{{ $data->stok }}</td>
                                    <td>{{ number_format($data->harga_satuan, 0,',', '.') }}</td>
                                    <td>{{ number_format($data->sub_total, 0,',', '.') }}</td>
                                    <td>{{ $data->rak->name }}</td>
                                    <td>{{ $data->suplaier->name }}</td>
                                    <td>{{ $data->suplaier->no_telp }}</td>
                                    <td>{{ $data->suplaier->alamat }}</td>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>PLU</th>
                                <th>Nama Barang</th>
                                <th>Barcode</th>
                                <th>Stok</th>
                                <th>Harga Satuan</th>
                                <th>Total Harga</th>
                                <th>Rak</th>
                                <th>Nama Suplaier</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection