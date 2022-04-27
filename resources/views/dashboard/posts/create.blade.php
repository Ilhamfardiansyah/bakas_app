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
                                    <label for="suplaier_id" class="form-label">Suplaier</label>
                                    <select class="form-control select2" name="suplaier_id" style="width: 100%;">
                                        <option selected="selected">Kode Suplaier</option>
                                        @foreach ($suplaiers as $suplaier)
                                            <option value="{{ $suplaier->id }}">{{ $suplaier->kode_po }}
                                                {{ $suplaier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="no_po" class="form-label">Nomer PO</label>
                                    <input type="number" class="form-control @error('no_po') is-invalid @enderror"
                                        id="no_po" name="no_po" value="{{ old('no_po') }}" required autofocus>
                                    @error('no_po')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="plu" class="form-label">PLU</label>
                                    <input type="number" class="form-control @error('plu') is-invalid @enderror" id="plu"
                                        name="plu" value="{{ old('plu') }}" required autofocus>
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
                                <div class="form-group col-md-4">
                                    <label for="rak_id" class="form-label @error('rak_id') is-invalid @enderror">Rak</label>
                                    <div class="form-group">
                                        <select class="form-control select2" name="rak_id" style="width: 100%;">
                                            <option selected="selected">Pilih Rak</option>
                                            @foreach ($raks as $rak)
                                                <option value="{{ $rak->id }}">
                                                    {{ $rak->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok"
                                        name="stok" value="{{ old('stok') }}" required>
                                    @error('stok')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger">Tambah Barang</button>
                        </form>
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
                    <h3 class="card-title"><b>Data Suplaier Masuk</b></h3>
                </div>
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Nama Suplaier</th>
                                <th>Kode Suplaier</th>
                                <th>Alamat Suplaier</th>
                                <th>No Tlp</th>
                                <th>Tanggal Suplaier Masuk</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suplaiers as $suplaier)
                                <tr>
                                    <td>{{ $suplaier->name }}</td>
                                    <td>{{ $suplaier->kode_po }}</td>
                                    <td>{{ $suplaier->alamat }}</td>
                                    <td>{{ $suplaier->no_telp }}</td>
                                    <td>{{ $suplaier->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama Suplaier</th>
                                <th>Kode Suplaier</th>
                                <th>Alamat Suplaier</th>
                                <th>no telpon</th>
                                <th>Tanggal Suplaier Masuk</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
