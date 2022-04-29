@extends('dashboard.layout.main')

@section('container')
    <section class="content">
        @include('sweetalert::alert')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- {{ dd(asset('js/instascan.js')) }} --}}
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <video id="preview"></video>
                            <div class="AppendTable">

                            </div>
                    
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

<script type="text/javascript">

let scanner = new Instascan.Scanner({ video: document.getElementById('preview'),mirror: false }  ); //dsni nama idnya preview
      scanner.addListener('scan', function (content) {
        $.ajax({
            url: "{{ url('scan') }}/" + content,
            cache: false,
            dataType: 'json',
            success: function(response){
                $('.AppendTable').html("")
                $('.AppendTable').append(`
                <table id="table_id" class="table table-bordered table-hover">
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
                                    <tr>
                                        <td>${response.data.plu}</td>
                                        <td>${response.data.nama_barang}</td>
                                        <td>${response.data.barcode}</td>
                                        <td>${response.data.rak_id}</td>
                                        <td>${response.data.stok}</td>
                                        <td>${response.data.suplaier_id}</td>
                                    </tr>

                                </tbody>
                                </tfoot>
                            </table>
                `)
            },
            error: function(response)
            {
                alert('gagal')
            }
            });
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });

</script>
@endsection
