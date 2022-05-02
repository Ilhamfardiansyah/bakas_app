@extends('dashboard.layout.main')

@section('container')
<form action="post" action="/dashboard/edit">
    <div class="form-group col-md-4">
        <label for="barcode" class="form-label">Nomer PO</label>
        <input type="number" class="form-control @error('barcode') is-invalid @enderror"
            id="barcode" name="barcode" value="{{ old('barcode', $post->barcode) }}" required autofocus>
        @error('barcode')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</form>
@endsection