@extends('layouts.app')

<title>APJ | Login</title>


@section('content')


<!--================login_part Area =================-->
<section class="login_part section_padding " style="margin-bottom: 60px ">
    <div class="container">
        <div class="row align-items-center" id="secao_login" >

            <div class="col-lg-6 col-md-6" style="padding-bottom: 0">
                <div class="login_part_form" id="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Bem vindo de volta! <br>
                            Porfavor, entre agora</h3>
                        <form class="row contact_form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input placeholder="Senha" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <button type="submit" value="submit" class="btn_3">
                                    Entrar
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="lost_pass" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center" style="padding-bottom: 0" id="aside_login">
                    <div class="login_
                    part_text_iner" >

                        <h2>É novo aqui?!</h2>
                        <p>Então não perca tempo e faça seu cadastro por aqui!</p>
                        <a href="#" class="btn_3" id="button_registro">Registrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
