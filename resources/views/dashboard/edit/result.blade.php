@extends('dashboard.layout.main')

@section('container')

<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @include('sweetalert::alert')
                <form action="{{ url('dashboard/cari/update') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <label class="form-label">Barcode
                            <input class="form-control" id="barcode" name="barcode" value="{{ $data->barcode }}"
                                required autofocus>
                        </label>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nama_barang" id="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control " value="{{ $data->nama_barang }}"
                                readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="no_po" id="no_po" class="form-label">No Invoice</label>
                            <input type="text" name="no_po" class="form-control " value="{{ $data->no_po}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="plu" class="form-label">PLU</label>
                            <input type="text" class="form-control" id="plu" name="plu" value="{{ $data->plu }}"
                                readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nama_barang" class="form-label">Suplaier</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                value="{{ $data->suplaier->name}}" readonly>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="barcode" class="form-label">Barcode</label>
                            <input type="number" class="form-control" id="barcode" name="barcode"
                                value="{{ $data->barcode }}" readonly>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" onkeyup="sum();" name="stok"
                                value="{{ $data->stok }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="harga_satuan" class="form-label">Harga Satuan</label>
                            <input type="text" class="form-control" id="harga_satuan" onkeyup="sum();"
                                name="harga_satuan" value="{{ $data->harga_satuan }}" readonly>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="sub_total" class="form-label">Total Harga</label>
                            <input type="text" class="form-control" id="sub_total" onkeyup="sum();" name="sub_total"
                                value="{{ $data->sub_total }}" required readonly>
                        </div>
                        <button type="submit" class="btn btn-success">Tambah Stok</button>
                    </div>
            </div>
        </div>
    </div>
</div>
</form>
<script>
    $("#barcode").on('keyup', function (e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            var value = $('#barcode').val()
            location.href = '{{ url("dashboard/cari/") }}/' + value;
        }
    })

</script>

<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('stok').value;
        var txtSecondNumberValue = document.getElementById('harga_satuan').value;
        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('sub_total').value = result;
        }
    }

</script>
<script>
    function cari() {
        var value = $('#barcode').val()
        location.href = '{{ url("dashboard/cari/") }}/' + value;
    }

</script>

@endsection
