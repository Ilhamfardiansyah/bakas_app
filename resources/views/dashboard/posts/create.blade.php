@extends('dashboard.layout.main')


@section('container')
    <section class="content">

        @include('sweetalert::alert')
        <div class="container">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>BARANG MASUK</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @include('sweetalert::alert')
                        <form method="post" action="{{ route('coba.post') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="no_po" id="no_po" class="form-label">No Invoice</label>
                                    <input type="text" name="no_po" class="form-control " value="{{ $invoice }}" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="suplaier_id" class="form-label">No Invoice</label>
                                    <select class="form-control select2" name="suplaier_id" style="width: 100%;">
                                        <option selected="selected">Kode Suplaier</option>
                                        @foreach ($suplaier as $suplaiers)
                                            <option value="{{ $suplaiers->id }}">{{ $suplaiers->kode_po }}
                                                {{ $suplaiers->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="plu" class="form-label">PLU</label>
                                    <input type="number" class="form-control @error('plu') is-invalid @enderror" id="plu"
                                        name="plu" value="{{ old('plu') }}">
                                    @error('plu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                        id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" required>
                                    @error('nama_barang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="barcode" class="form-label">Barcode</label>
                                    <input type="number" class="form-control @error('barcode') is-invalid @enderror"
                                        id="barcode" name="barcode" value="{{ old('barcode') }}" required>
                                    @error('barcode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="rak_id" class="form-label @error('rak_id') is-invalid @enderror">Rak</label>
                                    <div class="form-group">
                                        <select class="form-control select2" name="rak_id" style="width: 100%;">
                                           @foreach ($rak as $raks)
                                           <option selected="selected">Pilih Rak</option>
                                               <option value="{{ $raks->id }}">
                                                   {{ $raks->name }}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" onkeyup="sum();"
                                        name="stok" value="{{ old('stok') }}" required>
                                    @error('stok')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="harga_satuan" class="form-label">Harga Satuan</label>
                                    <input type="number" class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan" onkeyup="sum();" 
                                        name="harga_satuan" value="{{ old('harga_satuan') }}" required>
                                    @error('harga_satuan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="detail_id" class="form-label @error('detail_id') is-invalid @enderror">Detail</label>
                                    <div class="form-group">
                                        <select class="form-control select2" name="detail_id" style="width: 100%;">
                                            <option selected="selected">Detail</option>
                                            @foreach ($detail as $details   )
                                                <option value="{{ $details->id }}">
                                                    {{ $details->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Kategori</button>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="size_id" class="form-label @error('size_id') is-invalid @enderror">Size</label>
                                    <div class="form-group">
                                        <select class="form-control select2" name="size_id" style="width: 100%;">
                                            <option selected="selected">Size</option>
                                            @foreach ($size as $sizes)
                                                <option value="{{ $sizes->id }}">
                                                    {{ $sizes->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#exampleSize">Tambah Size</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sub_total" class="form-label">Total Harga</label>
                                    <input type="text" class="form-control @error('sub_total') is-invalid @enderror" id="sub_total" onkeyup="sum();" 
                                        name="sub_total" value="{{ old('sub_total') }}" required readonly>
                                    @error('sub_total')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah Barang</button>
                        </form>
@include('modal.size')
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </section>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $post)
                                <tr>
                                    <td>{{ $post->plu }}</td>
                                    <td>{{ $post->nama_barang }}</td>
                                    <td>{{ $post->barcode }}</td>
                                    <td>{{ $post->stok }}</td>
                                    <td>{{ number_format($post->harga_satuan, 0,',', '.') }}</td>
                                    <td>{{ number_format($post->sub_total, 0,',', '.') }}</td>
                                    <td>{{ $post->rak->name }}</td>
                                    <td>{{ $post->suplaier->name }}</td>
                                    <td>{{ $post->suplaier->no_telp }}</td>
                                    <td>{{ $post->suplaier->alamat }}</td>
                                    <td><button class="btn btn-success">Edit</button> | <button class="btn btn-danger">Delete</button></td>
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
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function sum() {
            var txtFirstNumberValue = document.getElementById('stok').value;
            var txtSecondNumberValue = document.getElementById('harga_satuan').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('sub_total').value=result;
            }
        }
    </script>
    @include('modal.create')
 @endsection
