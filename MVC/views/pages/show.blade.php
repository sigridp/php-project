@extends('layouts.master')

@section('title')
{{ $page->title }} | cmmproject 
@endsection

@section('content')
    @include('layouts.partials.jumbotron')
    
    @if($page->url == 'about')
        @include('pages.about')
    @endif
@endsection