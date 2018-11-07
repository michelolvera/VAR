@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="row">
        @if ($errors->has('email'))
        <div class="card-panel teal">
            <span class="white-text">{{ $errors->first('email') }}</span>
        </div>
        @endif
        @if ($errors->has('password'))
        <div class="card-panel teal">
            <span class="white-text">{{ $errors->first('password') }}</span>
        </div>
        @endif
        <div class="input-field">
            <input name="email" type="email" value="{{ old('email') }}" required>
            <label for="email">Correo electrónico</label>
        </div>
        <div class="input-field">
            <input name="password" type="password" required>
            <label for="password">Contraseña</label>
        </div>
        <p>
            <label>
                <input type="checkbox" class="filled-in" name="remember" {{ old('remember') ? 'checked' : '' }} />
                <span>Recordar contraseña</span>
            </label>
        </p>
        
        <div class="input-field row center-align">
            <button type="submit" class="btn waves-effect waves-light">
                Iniciar sesión
                <i class="material-icons right">send</i>
            </button>
            <a class="btn btn-link" href="{{ route('password.request') }}">
                ¿Olvidaste tu contraseña?
            </a>
        </div>
    </div>
</form>
@endsection