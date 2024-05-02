<div class="card mx-3" style="width: 18rem;">
    <div class="card-body" >
      <h5 class="card-title" style="font-weight: bold;">{{ $property->getExcerpt($property->title)}}</h5>
      <p class="card-text">{{ $property->surface }} mètres carré - {{ $property->city }} ({{ $property->postal_code }})</p>
      <div class="text-primary bold" style="font-size: 1.4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }} $
        </div>
      <a href="{{ route('show', ['slug' => $property->getSlug(), 'property' => $property->id]) }}" class="btn btn-primary">Lire la suite ...</a>
    </div>
</div>


