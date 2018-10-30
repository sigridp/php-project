@extends('layouts.master')

@section('title')
Your profile | cmm-project
@endsection

@section('content')
    @include('layouts.partials.jumbotron')
    <div class="container">
        <!-- notifications -->
        <div>
            @include('layouts.partials.notifications')
        </div>
        <!-- profile-image -->
        <div class="row">
            <div class="col-md-6 mb-5">
                <div class="profile-header-img">
                    <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" />
                </div>
            </div>
            <div class="col-md-6 mb-5 profile-data">
                <ul class="list-unstyled">
                    <li>ID: {{ Auth::user()->id }}</li>
                    <li>Naam: {{ Auth::user()->name }}</li>
                    <li>E-mail: {{ Auth::user()->email }}</li>
                </ul>
            </div>
        </div>
        <!-- upload form -->
        <div class="row">
            <div class="form-row mb-5">
                <form action="/profile" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Upload hier je foto. Het bestand (jpg/jpeg/png) mag niet groter zijn dan 2MB.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection