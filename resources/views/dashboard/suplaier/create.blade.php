@extends('dashboard.layout.main')

@section('container')
    <section class="content">
        @include('sweetalert::alert')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
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
                            <div class="col-lg-7">
                                @include('sweetalert::alert')
                                <form method="post" action="/dashboard/suplaier">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Suplaier</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_telp" class="form-label">Nomer Telephone</label>
                                        <input type="text" class="form-control @error('no_telp') is-invalid @enderror"
                                            id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required>
                                        @error('no_telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="kode_po" class="form-label">Kode PO Suplaier</label>
                                        <input type="text" class="form-control @error('kode_po') is-invalid @enderror"
                                            id="kode_po" name="kode_po" value="{{ old('kode_po') }}">
                                        @error('kode_po')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}
                                    <button type="submit" class="btn btn-primary">Tambah Barang</button>
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
                                <th>No Invoice</th>
                                <th>Alamat Suplaier</th>
                                <th>No Tlp</th>
                                <th>Tanggal Suplaier Masuk</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suplaier as $suplaiers)
                                <tr>
                                    <td>{{ $suplaiers->name }}</td>
                                    <td>{{ $suplaiers->kode_po }}</td>
                                    <td>{{ $suplaiers->alamat }}</td>
                                    <td>{{ $suplaiers->no_telp }}</td>
                                    <td>{{ $suplaiers->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama Suplaier</th>
                                <th>No Invoice</th>
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
