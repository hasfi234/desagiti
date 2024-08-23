<div id="potensi">
    <div class="container column secondary shadow">
        <div class="py-3 text-center border-bottom">
            <h5 class="fw-bold">Potensi Desa</h5>

            @if($potensi->count()!=0)
                @foreach($potensi as $item)
                    <div class="mx-auto">
                        <p class="mb-2">({{ $item->content }})</p>
                    </div>
                    <div class="overflow-hidden potgam" style="max-height: 50vh;">
                        <img src="{{ $item->picture ? asset('storage/' . $item->picture) : 'https://via.placeholder.com/600x400' }}"
                             class="img-fluid border rounded-3 shadow-lg" alt="{{ $item->title }}" loading="lazy">
                    </div>
                @endforeach
            @else
                <p>No village potentials available at the moment.</p>
            @endif
        </div>
    </div>
</div>