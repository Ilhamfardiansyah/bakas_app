@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Register Form</h2>
                <div class="text-center mb-5 text-dark">Bakas Warehouse</div>
                <div class="card my-5">
                    <link rel="stylesheet" href="css/style.css">

                    <form action="/register" method="post" enctype="multipart/form-data"
                        class="card-body cardbody-color p-lg-5">
                        @csrf
                        <div class="text-center">
                            <img src="{{ asset('template/dist/img/logo.png') }}"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                                alt="profile">
                        </div>

                        <div class="mb-3">
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                                id="username" placeholder="User Name" required value="{{ old('username') }}" autofocus>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                placeholder="NIK Karyawan" required value="{{ old('nik') }}">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror"
                                id="file" placeholder="Foto" required value="{{ old('file') }}">
                            @error('file')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="text-center"><button type="submit"
                                class="btn btn-color px-5 mb-5 w-100">Registrasi</button>
                        </div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">Back to<a href="/login"
                                class="text-dark fw-bold"> form login</a>
                        </div>
                    </form>
                </div>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
                    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                    crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
                                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                                crossorigin="anonymous">
                </script>
            </div>
        </div>
    </div>
@endsection
