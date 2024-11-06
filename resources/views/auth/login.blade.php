@extends('layouts.login')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <img src="{{ url('img/logo.jpg') }}" alt="" width="280" height="100">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style=" border-style: none !important">
                <div class="card-body" style="background-color: rgb(18, 18, 19);">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="d-flex">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-dark" style="border-radius: 0px !important;"><i class="bi bi-envelope-at"></i></button>
                                    </div>
                                    <input id="email" type="email" class="form-control rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"    required autocomplete="email" autofocus style="border-radius: 0px !important; border: 0px !important">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="d-flex">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-dark" style="border-radius: 0px !important;"><i class="bi bi-key"></i></i></button>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border-radius: 0px !important; border: 0px !important">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-dark btn-lg w-100" style="border-radius: 0px !important;">
                                        LOGIN
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md offset-md-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label text-white" for="remember">
                                            {{ __('Remember me') }}
                                        </label>
                                    </div>
                                    <div class="">
                                        @if (Route::has('register'))
                                            <a class="btn text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <p class="text-white">
            {{ strtoupper(\App\Models\FunnySayings::PHRASE[array_rand(\App\Models\FunnySayings::PHRASE, 1)]) }}
        </p>
    </div>

    
</div>
@endsection
