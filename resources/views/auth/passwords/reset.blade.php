@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="input-field">
        <input name="email" type="email" value="{{ old('email') }}" required>
        <label for="email">Correo electrónico</label>
        @if ($errors->has('email'))
        <div class="card-panel teal">
            <span class="white-text">{{ $errors->first('email') }}</span>
        </div>
        @endif
    </div>

    <div class="input-field">
        <input name="password" type="password" required>
        <label for="password">Contraseña</label>
        @if ($errors->has('password'))
        <div class="card-panel teal">
            <span class="white-text">{{ $errors->first('password') }}</span>
        </div>
        @endif
    </div>
    <div class="input-field">
        <input name="password_confirmation" type="password" required>
        <label for="password_confirmation">Repetir contraseña</label>
    </div>
    <div class="row center-align">
        <button type="submit" class="btn waves-effect waves-light">
            Reestablecer contraseña 
            <i class="material-icons right">send</i>
        </button>
    </div>
</form>
@endsection
