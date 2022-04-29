@extends('dashboard.layout.main')

@section('container')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <section class="content">
        @include('sweetalert::alert')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table_id" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>PLU</th>
                                        <th>Nama Barang</th>
                                        <th>Barcode</th>
                                        <th>Rak</th>
                                        <th>Harga Satuan</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $posts)
                                        <tr>
                                            <td>{{ $posts->plu }}</td>
                                            <td>{{ $posts->nama_barang }}</td>
                                            <td>{{ $posts->barcode }}</td>
                                            <td><a
                                                    href="/detail_rak/{{ $posts->rak->name }}">{{ $posts->rak->name }}</a>
                                            </td>
                                            <td>{{ number_format($posts->harga_satuan, 0,',', '.') }}</td>
                                            <td> {{ $posts->stok }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>PLU</th>
                                        <th>Nama Barang</th>
                                        <th>Barcode</th>
                                        <th>Rak</th>
                                        <th>Harga Satuan</th>
                                        <th>Stok</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <script>
                                $(function() {
                                    $("#table_id").DataTable({
                                        "responsive": true,
                                        "lengthChange": false,
                                        "autoWidth": false,
                                        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                                    }).buttons().container().appendTo('#table_id_wrapper .col-md-6:eq(0)');
                                });
                            </script>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </tbody>
                    <tfoot>
    </section>
@endsection
