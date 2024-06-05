@extends('auth.layout')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="text-center mb-0">Create Account</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('proses_register')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <label for="inputFirstName">Nama</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="inputFirstName" type="text" name="name" placeholder="Masukkan Nama" value="{{ old('name') }}"/>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputusername">Username</label>
                            <input class="form-control @error('username') is-invalid @enderror" id="inputusername" type="text" name="username" placeholder="Masukkan username" value="{{ old('username') }}"/>
                            @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputEmailAddress">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress" type="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}"/>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputPassword">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Masukkan Password"/>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-success btn-block mb-4 w-100" type="submit">Daftar!</button>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small w-100 text-white"><a href="{{ route('login') }}">Sudah Punya Akun? Login!</a></div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection