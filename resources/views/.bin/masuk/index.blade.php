@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-signin">
                {{-- <img src="img/logo-pondok-idris.png" alt="Masuk Sistem Informasi Santri"
                    width="180px"> --}}
                <div class="d-flex justify-content-center mt-5">
                    <img class="mb-4" src="img/logo-pondok-idris.png" alt="Masuk Sistem Informasi Santri"
                        width="140">
                </div>



                <h1 class="h3 mb-3 fw-normal text-center mb-4">Silakan Masuk</h1>
                <form action="/masuk" method="POST">
                    {{-- flash terdaftar --}}
                    @if (session()->has('terdaftar'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('terdaftar') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- flash gagal masuk --}}
                    @if (session()->has('masukGagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('masukGagal') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- flash keluar user --}}
                    @if (session()->has('keluar'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('keluar') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- flash no-user --}}
                    @if (session()->has('nouser'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('nouser') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @csrf {{-- CSRF security here --}}
                    <div class="form-floating">
                        <input type="text" class="form-control @error('nomer_induk') is-invalid @enderror"
                            name="nomer_induk" id="nomer_induk" placeholder="name@example.com" autofocus required
                            value="{{ old('nomer_induk') }}">
                        <label for="nomer_induk">Nomer ID</label>
                        @error('nomer_induk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                            required>
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-success mt-3" type="submit">Masuk</button>
                </form>
                <small class="d-block text-center mt-4">Belum terdaftar? <a href="/daftar">Daftar sekarang.</a></small>
            </main>
        </div>
    </div>
@endsection