@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col-md-12 text-center p-3 bg-info">
            <img style="width: 50px; height: 50px; border-radius:5px; margin-right:5px;" src="{{url('assets/images/petsomdach.jpeg')}}" alt=""> <span class="text-white">សមាគមគ្រូពេទ្យស្ម័គ្រចិត្ត យុវជនសម្ដេចតេជោ</span>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}
                <div class="card-header">ចូលប្រើប្រាស់</div>


                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            {{-- <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label> --}}
                            <label for="username" class="col-md-4 col-form-label text-md-end">ឈ្មោះអ្នកប្រើប្រាស់ <span class="text-danger">*</span></label>


                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}
                            <label for="password" class="col-md-4 col-form-label text-md-end">លេខសម្ងាត់​ <span class="text-danger">*</span></label>


                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- 
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <div class="form-check mb-3">
                                    <input class="form-check-input pcheck" type="checkbox" id="showPassword" onclick="myFunction()">
                                    <label class="form-check-label" for="showPassword">
                                      មើលលេខសម្ងាត់
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    ចូល
                                </button>
                                {{-- <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button> --}}

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>