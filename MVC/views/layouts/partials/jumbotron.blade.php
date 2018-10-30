<!-- toon andere jumbotron bij newsitems -->
@if(empty($page)) 
<section class="jumbotron text-center hero-image showItem">
    <div class="container">
        <h1 class="jumbotron-heading">Webdeveloper project</h1>
        <p>Klopt er iets niet aan dit bericht?</p>
        <p>Log in en 'edit' het bericht.</p>
    </div>
</section>
@else 
<!-- standaard jumbotron voor basic pages met dynamische class-name-->
<section class="jumbotron text-center hero-image {{ $page->url }}">
    <div class="container">
        <h1 class="jumbotron-heading">Webdeveloper project</h1>
        <p>Welkom op de {{ $page->title }}-pagina</p>
        <p>{!! $page->content !!}</p>
        <!-- toon alleen 'nieuw bericht toevoegen'-button op de nieuwspagina-->
        @if($page->url == 'news')
            @auth<small class="text-muted"><a href="/news/create" class="btn btn-primary">Nieuw bericht</a></small>@endauth
        @endif 
    </div>
</section>
@endif