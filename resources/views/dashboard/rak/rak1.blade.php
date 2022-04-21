@extends('dashboard.layout.main')

@section('container')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>PLU</th>
                                        <th>Nama Barang</th>
                                        <th>Barcode</th>
                                        <th>Rak</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->rak->name }}</td>
                                            <td>{{ $post->nama_barang }}</td>
                                            <td>{{ $post->barcode }}</td>
                                            <td>{{ $post->plu }}</td>
                                            <td> {{ $post->stok }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>PLU</th>
                                        <th>Nama Barang</th>
                                        <th>Barcode</th>
                                        <th>Rak</th>
                                        <th>Stok</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </tbody>
                    <tfoot>
    </section>
@endsection
