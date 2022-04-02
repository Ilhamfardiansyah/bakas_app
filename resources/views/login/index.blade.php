@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Login Form</h2>
                <div class="text-center mb-5 text-dark">Made with bootstrap</div>
                <div class="card my-5">
                    <link rel="stylesheet" href="css/style.css">
                    @include('sweetalert::alert')


                    {{-- @if (session()->has('loginEror'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginEror') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif --}}
                    <form action="/login" method="post" class="card-body cardbody-color p-lg-5">
                        @csrf
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                                alt="profile">
                        </div>

                        <div class="mb-3">
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                aria-describedby="nik" placeholder="NIK Karyawan" value="{{ old('nik') }}" autofocus>
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="password" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="text-center"><button type="submit"
                                class="btn btn-color px-5 mb-5 w-100">Login</button></div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                            Registered? <a href="#" class="text-dark fw-bold"> Create an
                                Account</a>
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
