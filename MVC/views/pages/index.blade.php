@extends('layouts.master')

@section('title')
Welcome at cmmproject
@endsection
    
@section('content')
    <section class="jumbotron text-center hero-image home">
        <div class="container">
            <h1 class="jumbotron-heading">Webdeveloper project</h1>
            <p>Welkom op de home-pagina</p>
            @auth<small class="text-muted"><a href="/news/create" class="btn btn-primary">Nieuw bericht</a></small>@endauth
        </div>
    </section>
    
    @include('pages.welcome')
@endsection