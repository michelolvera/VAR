@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf
    
    <div class="row">
        <div class="col s12 m8 l10 offset-m4 offset-l1">
            <div class="input-field col s12 m12 l4">
                <input name="name" type="text" value="{{ old('name') }}" required>
                <label for="name">Nombre</label>
                @if ($errors->has('name'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('name') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-field col s12 m12 l4">
                <input name="paternal_surname" type="text" value="{{ old('paternal_surname') }}" required>
                <label for="paternal_surname">Apellido paterno</label>
                @if ($errors->has('paternal_surname'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('paternal_surname') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-field col s12 m12 l4">
                <input name="maternal_surname" type="text" value="{{ old('maternal_surname') }}" required>
                <label for="maternal_surname">Apellido materno</label>
                @if ($errors->has('maternal_surname'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('maternal_surname') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-field col s12 m12 l12">
                <input name="email" type="email" value="{{ old('email') }}" required>
                <label for="email">Correo electrónico</label>
                @if ($errors->has('email'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('email') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-field col s12 m12 l6">
                <input name="password" type="password" required>
                <label for="password">Contraseña</label>
                @if ($errors->has('password'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('password') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-field col s12 m12 l6">
                <input name="password_confirmation" type="password" required>
                <label for="password_confirmation">Repetir contraseña</label>
            </div>
            <div class="input-field col s12 m12 l6">
                <input name="rfc" type="text" value="{{ old('rfc') }}" required>
                <label for="rfc">RFC</label>
                @if ($errors->has('rfc'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('rfc') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-field col s12 m12 l6">
                <input name="phone_number" type="tel" value="{{ old('phone_number') }}" required>
                <label for="phone_number">Teléfono</label>
                @if ($errors->has('phone_number'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('phone_number') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-field col s12 m12 l4">
                <input name="street" type="text" value="{{ old('street') }}">
                <label for="street">Calle</label>
                @if ($errors->has('street'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('street') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-field col s6 m12 l2">
                <input name="address_number" type="text" value="{{ old('address_number') }}" required>
                <label for="address_number">Número</label>
                @if ($errors->has('address_number'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('address_number') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-field col s12 m12 l4">
                <input name="neighborhood" type="text" value="{{ old('neighborhood') }}" required>
                <label for="neighborhood">Colonia</label>
                @if ($errors->has('neighborhood'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('neighborhood') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-field col s6 m12 l2">
                <input name="zip_code" type="text" value="{{ old('zip_code') }}" required>
                <label for="zip_code">Código postal</label>
                @if ($errors->has('zip_code'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('zip_code') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-field col s12 m12 l6">
                <input name="between_streets" type="text" value="{{ old('between_streets') }}" required>
                <label for="between_streets">Entre calles</label>
                @if ($errors->has('between_streets'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('between_streets') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-field col s12 m12 l6">
                <input name="city" type="text" value="{{ old('city') }}" required>
                <label for="city">Ciudad</label>
                @if ($errors->has('city'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('city') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-fiel col s12 m12 l6">
                <select name="countrie_id" value="{{ old('countrie_id') }}" required>
                    <option value="1">México</option>
                </select>
                <label>País</label>
                @if ($errors->has('countrie_id'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('countrie_id') }}</span>
                    </div>
                @endif
            </div>
            <div class="input-fiel col s12 m12 l6">
                <select name="state_id" value="{{ old('state_id') }}" required>
                    <option value="1">Michoacán</option>
                </select>
                <label>Estado</label>
                @if ($errors->has('state_id'))
                    <div class="card-panel teal">
                        <span class="white-text">{{ $errors->first('state_id') }}</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="row center-align">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn waves-effect waves-light">
                    Registrarse
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </div>
</form>
@endsection