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
                            <form method="post" action="/dashboard/rak">
                                @csrf
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Input Rak</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="detailrak_id" class="form-label">Kategori Rak</label>
                                    <select class="form-control select2" name="detailrak_id" style="width: 100%;">
                                        <option selected="selected">Kategori Rak</option>
                                        @foreach ($detail_rak as $suplaiers)
                                        <option value="{{ $suplaiers->id }}">{{ $suplaiers->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                            <th>Rak</th>
                            <th>Type Rak</th>
                            <th>Posisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rak as $raks)
                        <tr>
                            <td>{{ $raks->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Rak</th>
                            <th>Type Rak</th>
                            <th>Posisi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
