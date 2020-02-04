@extends('layouts.portal')

@section('jsLogin')
    <script src="./js/login.js"></script>
@endsection


@section('baseDoPortal')
    <div class="center-login" >

            <div class="card contorno-btn">
                <div class="card-body">
                    <h3 class="text-center titulo">Login</h3>

                    <form autocomplete="on" method="POST" action="{{ route('logar') }}" id="formLogin" >
                        @csrf

                        {{-- alerta para caso a senha esteja incorreta --}}
                        @if(session('mensagem'))
                            <div class="alert alert-danger alert-size" >
                                <p>{{session('mensagem')}}</p>
                            </div>
                        @endif

                        <div class="form-group ">
                            <div class="col-md-12">
                                <input id="login" type="text" placeholder="Digite seu login ou email" class="form-control"  name="login" required autocomplete="login" autofocus>
                            </div>
                        </div>

                        <div class="form-group ">

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Digite a senha" class="form-control @error('password') is-invalid @enderror" name="password" required >
                            </div>

                        </div>

                        <di class="form-group">
                            <div class="col-md-12">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Lembre-me') }}
                                </label>
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                                <button type="submit" id="entrar" style="width:100%;" class="btn float-center btn-primary">
                                    {{ __('Entrar') }}
                                </button>
                            </div>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu a senha?') }}
                                    </a>
                                @endif

                        </div>
                    </form>




                </div>
            </div>
    </div>

@endsection
