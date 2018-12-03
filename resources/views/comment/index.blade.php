@extends('layouts.app')
@section('content')
<table class="responsive-table centered">
    <thead>
        <tr>
            <th>Pregunta</th>
            <th>Usuario</th>
            <th>Producto</th>
            <th>Respuesta</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
        <tr>
            <td>{{ $comment->text }}</td>
            <td><a href="/user/{{ $comment->user()->first()->id }}">{{ $comment->user()->first()->name }}</a></td>
            <td><a href="/product/{{ $comment->product()->first()->slug }}">{{ $comment->product()->first()->name }}</a></td>
            <td>
                @if ($comment->replie()->first()==null)
                <a class="waves-effect waves-light btn modal-trigger" href="#modalResponse" onclick="change_form({{$comment->id}});"><i class="material-icons left">message</i>Responder</a>
                @else
                {{ $comment->replie()->first()->text }}
                @endif
            </td>
            <td>
                <a id="btn_eliminar" href="#" onclick="event.preventDefault(); delete_form('{{ $comment->id }}');" class="red waves-effect waves-light btn"
                    style="margin-left: 0.5em"><i class="material-icons left">delete</i>Eliminar</a>
                <form id="delete-form-{{ $comment->id }}" action="comment/{{ $comment->id }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div id="modalResponse" class="modal">
    <form id="response_form" method="POST">
        @csrf
        <div class="modal-content">
            <h4>Responder comentario</h4>
            <div class="input-field">
                <textarea id="text" class="materialize-textarea" name="text" required>{{ old('text') }}</textarea>
                <label for="text">Escribe la respuesta...</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-close waves-effect waves-green btn-flat">Enviar</a>
        </div>
    </form>
</div>
@endsection

@section('extraimports')
<script src="{{ asset('js/comment/delete.js') }}"></script>
@endsection
