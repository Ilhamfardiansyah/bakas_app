@extends('dashboard.layout.main')

@section('container')
    <div class="col-lg-8">
        <form action="/dashboard/posts" method="post">
            @csrf
            <div class="container mb-3">
                <label for="text" class="form-label">Id Barang</label>
                <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang">
            </div>
            <div class="container mb-3">
                <label for="text" class="form-label">Barcode</label>
                <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode">
            </div>
            <div class="container mb-3">
                <label for="text" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang">
            </div>
            <div class="container mb-3">
                <label for="text" class="form-label">Rak</label>
                <select class="form-select" name="rak" id="rak">
                    <option selected>Pilih Rak</option>
                    <option value="1">Rak 1</option>
                    <option value="2">Rak 2</option>
                    <option value="3">Rak 3</option>
                </select>
            </div>
            <div class="container mb-3">
                <label for="text" class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok">
            </div>

        </form>
    </div>
@endsection
