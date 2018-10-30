@extends('layouts.master')

@section('title')
news | cmmproject
@endsection

@section('content')
    @include('layouts.partials.jumbotron')
    <main id="content" class="container">
        <div>
            @include('layouts.partials.notifications')
        </div>

        @include('news.news')

        <div class="pagination justify-content-center">
            {{ $newsItems->links() }}
        </div>
    </main>
@endsection