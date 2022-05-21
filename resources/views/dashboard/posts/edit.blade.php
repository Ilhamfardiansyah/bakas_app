@extends('dashboard.layout.main')

@section('container')
<div class="container mt-4">
    @include('sweetalert::alert')
    <form action="{{ url('dashboard/edit/'. $post->plu) }}" method="post">
        @method('put')
        @csrf
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                value="{{ $post->nama_barang }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    @endsection
</div>


