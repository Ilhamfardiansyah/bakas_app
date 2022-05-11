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
                                <div class="mb-3">
                                    <label for="name" class="form-label">Input Rak</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type Rak</label>
                                    <input type="text" class="form-control @error('type') is-invalid @enderror"
                                        id="type" name="type" value="{{ old('type') }}" required autofocus>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="posisi" class="form-label">Posisi Rak</label>
                                    <input posisi="text" class="form-control @error('posisi') is-invalid @enderror"
                                        id="posisi" name="posisi" value="{{ old('posisi') }}" required autofocus>
                                    @error('posisi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                                <td>{{ $raks->type }}</td>
                                <td>{{ $raks->posisi }}</td>
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