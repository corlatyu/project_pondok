@extends('auth.layout')

@section('content')
<div class="login-container">
    <img src="{{ asset('img/logo.png') }}" class="img-fluid rounded-circle" width="100">
    <form action="{{ url('proses_login') }}" method="POST">
        @csrf
        @if(session('login_gagal'))
        <div class="alert alert-danger" role="alert">
            <strong>Warning!</strong> {{ session('login_gagal') }}
        </div>
        @endif
        <div class="form-group">
            <input
                id="inputUsername"
                name="username"
                type="text"
                placeholder="Masukkan Username"
                required
                value="{{ old('username') }}"
                class="form-control @error('username') is-invalid @enderror"
            />
            @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input
                id="inputPassword"
                type="password"
                name="password"
                placeholder="Masukkan Password"
                required
                class="form-control @error('password') is-invalid @enderror"
            />
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Masuk</button>
    </form>
    <div class="links">
        <br>
        <a href="{{ route('register') }}">Belum Punya Akun? Register!</a>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush
