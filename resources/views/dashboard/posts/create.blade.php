@extends('dashboard.layout.main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

@section('container')
    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts">
            @csrf
            <div class="mb-3">
                <label for="plu" class="form-label">PLU</label>
                <input type="number" class="form-control" id="plu" name="plu">
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang">
            </div>
            <div class="mb-3">
                <label for="barcode" class="form-label">Barcode</label>
                <input type="number" class="form-control" id="barcode" name="barcode">
            </div>
            <div class="mb-3">
                <label for="rak_id" class="form-label">Rak</label>
                <select class="form-select" name="rak_id">
                    @foreach ($raks as $rak)
                        <option value="{{ $rak->id }}">{{ $rak->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok">
            </div>

            <button type="submit" class="btn btn-primary">Tambah Barang</button>
        </form>
    </div>
@endsection
