@extends('layouts.master')

@section('title')
show item | cmmproject
@endsection

@section('content')
    @include('layouts.partials.jumbotron')
    <div class="container">
        <div>
            @include('layouts.partials.notifications')
        </div>
        <h2>{{ $item->title }}</h2>
        <p>Gepubliceerd: {{ $item->getDate()->formatLocalized('%d %B %Y') }}</p>
        <p>{!! $item->content !!}</p>

        @auth
        <!-- voor het aanpassen van een nieuwsbericht -->
        <div class="btn-group" role="group">
            <a href="/news/{{ $item->id }}/edit" class="btn btn-primary m1-2" aria-label="Basic example">Edit</a>
        </div>
        <!-- voor het verwijderen van een nieuwsbericht -->  
        <div class="btn-group" role="group">  
            <form method="post" action="/news/{{ $item->id }}">{{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
        @endauth
        
        <hr>
        <a href="/news"><i class="fas fa-angle-double-left" aria-hidden="true"></i>Terug</a>
    </div>
@endsection