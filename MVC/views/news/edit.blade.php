@extends('layouts.master')

@section('title')
edit | cmmproject 
@endsection

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12">
                <h1>Edit item: {{ $item->title }}</h1>
                <hr>
                <!-- edit formulier -->
                <form method="post" action="/news/{{ $item->id}}">{{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Titel</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $item->title }}">
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ $item->url }}">
                    </div>
                    <div class="form-group">
                        <label for="publish_date">Publicatie datum</label>
                        <input type="date" class="form-control" id="publish_date" name="publish_date" value="{{ $item->publish_date }}" placeholder="yyyy-mm-dd">
                    </div>
                    <div class="form-group">
                        <label for="contentNews">Content</label>
                        <textarea class="form-control" id="contentNews" name="content">{{ $item->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <hr>
                    <a href="/news/{{ $item->url }}">Terug </a>

                    <!-- error handling -->
                    <div>
                        @include('layouts.partials.notifications')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection