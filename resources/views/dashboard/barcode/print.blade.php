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
                                    <th>
                                        <input type="checkbox" name="select_all" id="select_all">
                                    </th>
                                    <th>PLU</th>
                                    <th>Nama Barang</th>
                                    <th>Barcode</th>
                                    <th>Rak</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Kategori</th>
                                    <th>Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $posts)
                                <tr>
                                    <td>{{ $posts->plu }}</td>
                                    <td>{{ $posts->nama_barang }}</td>
                                    <td>{{ $posts->barcode }}</td>
                                    <td><a href="/detail_rak/{{ $posts->rak->name }}">{{ $posts->rak->name }}</a>
                                    </td>
                                    <td>{{ number_format($posts->harga_jual, 0,',', '.') }}</td>
                                    <td> {{ $posts->stok }}</td>
                                    <td>{{ $posts->detail->name }}</td>
                                    <td>{{ $posts->size->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="select_all" id="select_all">
                                    </th>
                                    <th>PLU</th>
                                    <th>Nama Barang</th>
                                    <th>Barcode</th>
                                    <th>Rak</th>
                                    <th>Harga Satuan</th>
                                    <th>Stok</th>
                                    <th>Kategori</th>
                                    <th>Size</th>
                                </tr>
                            </tfoot>
                        </table>
                        <script>
                            $(document).ready(function () {
                                $('#table_id').DataTable({
                                    "order": [
                                        [3, "desc"]
                                    ]
                                });
                                $('checkall').change(function () {
                                    $('.checkitem').prop("checked", $(this).prop("checked"))
                                });
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
