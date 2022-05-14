@extends('dashboard.layout.main')

@section('container')

<div class="container">
    @include('sweetalert::alert')
    <form action="{{ url('/dashboard/update/'.$data->id) }}" method="post">
        @method('put')
        @csrf
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name"  class="form-label">Nama Perusahaan</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $data->name }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control " value="{{ $data->alamat }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="no_telp" class="form-label">No Telphone</label>
                        <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ $data->no_telp }}">
                    </div>
                    
                    <div class="form-group col-md-5">
                        <label class="form-label">Kode Suplaier</label>
                        <input type="tetxt" class="form-control" value="{{ $data->kode_po }}" readonly>
                    </div>
                    
                    
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
