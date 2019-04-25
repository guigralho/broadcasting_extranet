@extends('layouts.login')

@section('content')

    <div class="login-wrapper">
        <!-- START Login Background Pic Wrapper-->
        <div class="bg-pic">
            <!-- START Background Pic-->
            <img src="{{ asset('img/bg.jpg') }}" data-src="{{ asset('img/bg.jpg') }}" data-src-retina="{{ asset('img/bg.jpg') }}" alt="" class="lazy">
            <!-- END Background Pic-->
            <!-- START Background Caption-->
            <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
                <h2 class="semi-bold text-white">Broadcasting</h2>
            </div>
            <!-- END Background Caption-->
        </div>
        <!-- END Login Background Pic Wrapper-->
        <!-- START Login Right Container-->
        <div class="login-container bg-white">
            <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
                {{--<img src="{{ asset('img/logo.svg') }}" alt="logo" data-src="{{ asset('img/logo.svg') }}" data-src-retina="{{ asset('img/logo.svg') }}" width="200">--}}
                <p class="p-t-35">Bem-vindo! Autentique-se abaixo para iniciar:</p>
                <!-- START Login Form -->
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- START Form Control-->
                    <div class="form-group form-group-default">
                        <label class="fade">Email</label>
                        <div class="controls">
                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <label class="text-danger text-hint">{{ $errors->first('email') }}</label>
                            @endif
                        </div>
                    </div>
                    <!-- END Form Control-->
                    <!-- START Form Control-->
                    <div class="form-group form-group-default">
                        <label class="fade">Senha</label>
                        <div class="controls">
                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <label class="text-danger text-hint">{{ $errors->first('password') }}</label>
                            @endif
                        </div>
                    </div>
                    <!-- START Form Control-->
                    <div class="row">
                        <div class="col no-padding sm-p-l-10">
                            <div class="checkbox ">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Manter conectado</label>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-end">
                            <a href="{{ route('password.request') }}">Esqueci a senha</a>
                        </div>
                    </div>
                    <!-- END Form Control-->
                    <button class="btn btn-primary btn-cons m-t-10" type="submit">Entrar</button>
                </form>
                <!--END Login Form-->
            </div>
        </div>
        <!-- END Login Right Container-->
    </div>
@endsection
