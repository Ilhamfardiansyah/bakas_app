@extends('dashboard.layout.main')

</script>

@section('container')
    <div class="col-lg-7">
        @include('sweetalert::alert')
        <form method="post" action="{{ url('dashboard/posts') }}">
            @csrf
            <div class="mb-3">
                <label for="kode_po" class="form-label">Kode PO</label>
                <select class="form-select" name="kode_po" required>
                    <option selected>Pilih Suplaier</option>
                    @foreach ($suplaiers as $suplaier)
                        <option value="{{ $suplaier->id }}">{{ $suplaier->kode_po }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="no_po" class="form-label">Nomer PO</label>
                <input type="number" class="form-control @error('no_po') is-invalid @enderror" id="no_po" name="no_po"
                    value="{{ old('no_po') }}" required autofocus>
                @error('no_po')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="plu" class="form-label">PLU</label>
                <input type="number" class="form-control @error('plu') is-invalid @enderror" id="plu" name="plu"
                    value="{{ old('plu') }}" required autofocus>
                @error('plu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang"
                    name="nama_barang" value="{{ old('nama_barang') }}" required>
                @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="barcode" class="form-label">Barcode</label>
                <input type="number" class="form-control @error('barcode') is-invalid @enderror" id="barcode" name="barcode"
                    value="{{ old('barcode') }}" required>
                @error('barcode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rak_id" class="form-label">Rak</label>
                <select class="form-select" name="rak_id" required>
                    <option selected>Pilih Rak</option>
                    @foreach ($raks as $rak)
                        <option value="{{ $rak->id }}">{{ $rak->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok"
                    value="{{ old('stok') }}" required>
                @error('stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah Barang</button>
        </form>
    </div>
@endsection
