<!--notifications for error-handling-->
@if( count( $errors ) ) 
    <div class="form-group">
        <div class="alert alert-danger">
            @foreach( $errors->all() as $error )
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif

<!--notifications for success-handling-->
@if( session('success'))
    <div class="alert alert-success">
        {{ session("success")}}
    </div>
@endif