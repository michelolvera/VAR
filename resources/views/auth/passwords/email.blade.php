@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="card-panel teal">
    <span class="white-text">{{ session('status') }}</span>
</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="input-field">
        <input name="email" type="email" value="{{ old('email') }}" required>
        <label for="email">Correo electrónico</label>
        @if ($errors->has('email'))
        <div class="card-panel teal">
            <span class="white-text">{{ $errors->first('email') }}</span>
        </div>
        @endif
    </div>
    <div class="row center-align">
        <button type="submit" class="btn waves-effect waves-light">
            Enviar enlace de restablecimiento al correo electrónico
            <i class="material-icons right">send</i>
        </button>
    </div>
</form>
@endsection
