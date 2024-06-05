@extends('auth.layout')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100 bg-light">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center text-white py-4">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid rounded-circle" width="100">
                </div>
                <div class="card-body px-4 py-5">
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form action="{{ url('proses_login') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            @error('login_gagal')
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <label for="inputEmailAddress">Username</label>
                            <input class="form-control @error('username') is-invalid @enderror" id="inputEmailAddress" name="username" type="text" placeholder="Masukkan Username"/>
                            @error('username')
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
                        <div class="form-group form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="rememberPasswordCheck">
                            <label class="form-check-label" for="rememberPasswordCheck">Remember password</label>
                        </div>
                        <div class="d-flex justify-content-right">
                            <button class="btn btn-success btn-block w-100" type="submit">Login</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection