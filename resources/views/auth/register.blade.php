@extends('auth.layout')

@section('content')
<div class="register-container">
    <h3>Create Account</h3>
    <form action="{{route('proses_register')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="inputFirstName">Nama</label>
            <input class="@error('name') is-invalid @enderror" id="inputFirstName" type="text" name="name" placeholder="Masukkan Nama" value="{{ old('name') }}"/>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputusername">Username</label>
            <input class="@error('username') is-invalid @enderror" id="inputusername" type="text" name="username" placeholder="Masukkan username" value="{{ old('username') }}"/>
            @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputEmailAddress">Email</label>
            <input class="@error('email') is-invalid @enderror" id="inputEmailAddress" type="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}"/>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input class="@error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Masukkan Password"/>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Daftar!</button>
    </form>
    <div class="card-footer">
        <a href="{{ route('login') }}">Sudah Punya Akun? Login!</a>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush