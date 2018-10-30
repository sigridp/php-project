@extends( 'layouts.master' )

@section('content')
<div class="container">
    <div class="error-page">       
            <h1>Helaas, betreffende pagina niet gevonden</h1>
            <img class="error-image" src="{{ asset('images/404.png')}}" alt="error-page" >
    </div>
</div>
@endsection
