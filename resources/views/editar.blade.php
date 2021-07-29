@php
$usuario = Auth::user();
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>

                <div class="card-body">
                    <form method="POST" action="/home/editar">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                            {{$usuario->name}}

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                            {{$usuario->cpf}}

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('RG') }}</label>

                            <div class="col-md-6">
                                <input id="rg" type="text" class="form-control @error('name') is-invalid @enderror" name="rg" value="{{$usuario->rg}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Data de nascimento') }}</label>
                            <div class="col-md-6">
                                <input id="data_nascimento" type="date" class="form-control @error('name') is-invalid @enderror" name="data_nascimento" value="{{$usuario->data_nascimento}}" required autocomplete="name" autofocus>

                                @error('data_nascimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha antiga') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="antiga-password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="conf" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- <form action="/home/editar" method="post">
@csrf
<div class="form-controls">
        <label class="label-controls" for="name">Nome</label>
        {{$usuario->cpf}}
    </div>
    <div class="form-controls">
        <label class="label-controls" for="name">Nome</label>
        {{$usuario->rg}}
    </div>
    <div class="form-controls">
        <label class="label-controls" for="name">Nome</label>
        <input type="text" name="name" id="name" placeholder="Nome" value='{{$usuario->name}}' />
    </div>
    <div class="form-controls">
        <label class="label-controls"  for="password">Senha antiga</label>
        <input class="form-controls" type="password" name="antiga-password" id="password" placeholder="Senha antiga" />
    </div>
    <div class="form-controls">
        <label class="label-controls" for="password">Nova senha</label>
        <input type="password" name="password" id="password" placeholder="Nova senha"/>
    </div>
    <div class="form-controls">
        <label class="label-controls" for="conf">Confirma senha</label>
        <input type="password" name="conf" id="conf" placeholder="Confirma nova senha"/>
    </div>
    <button class="btn btn-success" type="submit">Editar</button>
</form> -->

