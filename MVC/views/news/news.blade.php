<div class="row">
    @foreach($newsItems as $item)
    <div class="col-md-4 card-group">
        <div class="card flex-md-row mb-4 box-shadow h-md-120">        
            <div class="card-body d-flex flex-column align-items-start">
                <h3 class="mb-0"><a href="/news/{{ $item->url }}">{{ $item->title }}</a></h3>
                <div class="mb-1 text-muted">gepubliceerd: {{ $item->getDate()->formatLocalized('%d %B %Y') }}</div>
                <div class="card-text mb-auto">{{ str_limit($item->content, 150) }}</div>
                <small class="text-muted"><a href="/news/{{ $item->url }}">Lees meer</a></small>
            </div>
        </div>
    </div>
    @endforeach
</div>