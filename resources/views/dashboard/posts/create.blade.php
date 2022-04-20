@extends('dashboard.layout.main')

</script>

@section('container')
    <div class="col-lg-8">
        @include('sweetalert::alert')
        <form method="post" action="/dashboard/posts">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Suplaier</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                    value="{{ old('alamat') }}" required autofocus>
                @error('alamat')
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
