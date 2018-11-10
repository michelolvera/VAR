@extends('layouts.app')

@section('content')
<div class="slider">
    <ul class="slides">
        @foreach ($slides as $slide)
        <li>
            @if ($slide->redirect != null)
            <a href="{{ $slide->redirect }}"><img src="{{ $slide->img_url }}"></a>
            @else
            <img src="{{ $slide->img_url }}">
            @endif
            <div class="caption center-align">
                <h3>{{ $slide->title }}</h3>
                <h5 class="light grey-text text-lighten-3">{{ $slide->text }}</h5>
            </div>
        </li>
        @endforeach
    </ul>
</div>
<div id="ofertas">
    <h2 class="center-align">Ofertas</h2>
    <div class="row">
        <div class="carousel carousel-up">  
            <div class="carousel-item">
                <div class="card">
                    <div class="card-image">
                        <img src="svg/404.svg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content" style="padding: 0.5em;">
                        <p>I am a ver</p>
                    </div>
                    <div class="card-action" style="padding: 0.5em;">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="card-image">
                        <img src="svg/404.svg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content" style="padding: 0.5em;">
                        <p>I am a ver</p>
                    </div>
                    <div class="card-action" style="padding: 0.5em;">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="card-image">
                        <img src="svg/404.svg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content" style="padding: 0.5em;">
                        <p>I am a ver</p>
                    </div>
                    <div class="card-action" style="padding: 0.5em;">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="card-image">
                        <img src="svg/404.svg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content" style="padding: 0.5em;">
                        <p>I am a ver</p>
                    </div>
                    <div class="card-action" style="padding: 0.5em;">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="card-image">
                        <img src="svg/404.svg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content" style="padding: 0.5em;">
                        <p>I am a ver</p>
                    </div>
                    <div class="card-action" style="padding: 0.5em;">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="card-image">
                        <img src="svg/404.svg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content" style="padding: 0.5em;">
                        <p>I am a ver</p>
                    </div>
                    <div class="card-action" style="padding: 0.5em;">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="card-image">
                        <img src="svg/404.svg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content" style="padding: 0.5em;">
                        <p>I am a ver</p>
                    </div>
                    <div class="card-action" style="padding: 0.5em;">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="card-image">
                        <img src="svg/404.svg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content" style="padding: 0.5em;">
                        <p>I am a ver</p>
                    </div>
                    <div class="card-action" style="padding: 0.5em;">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="card-image">
                        <img src="svg/404.svg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content" style="padding: 0.5em;">
                        <p>I am a ver</p>
                    </div>
                    <div class="card-action" style="padding: 0.5em;">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="card-image">
                        <img src="svg/404.svg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content" style="padding: 0.5em;">
                        <p>I am a ver</p>
                    </div>
                    <div class="card-action" style="padding: 0.5em;">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="card-image">
                        <img src="svg/404.svg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content" style="padding: 0.5em;">
                        <p>I am a ver</p>
                    </div>
                    <div class="card-action" style="padding: 0.5em;">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('extraimports')
<script src="{{ asset('js/home.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection