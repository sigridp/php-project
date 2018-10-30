@extends('layouts.master')

@section('title')
create | cmmproject 
@endsection

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12">
                <h1>Aanmaken nieuw bericht</h1>
                <hr>
                <!-- create news-item formulier -->
                <form method="post" action="/news">{{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Titel</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ old('url')}}">
                    </div>
                    <div class="form-group">
                        <label for="publish_date">Publicatie datum</label>
                        <input type="date" class="form-control" id="publish_date" name="publish_date" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d")?>">
                    </div>
                    <div class="form-group">
                        <label for="contentNews">Content</label>
                        <textarea class="form-control" id="contentNews" name="content">{{ old('content')}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!-- error handling -->
                    <div>
                        @include('layouts.partials.notifications')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection