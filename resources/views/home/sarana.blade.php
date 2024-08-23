<div id="sarana">
        <div class="container column secondary shadow">
            <h5 class="pb-3 border-bottom">Sarana Desa</h5>
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-3">
                
                @foreach($saranas as $item)
                <div class="col" style="min-height: 40vh">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
                        style="background-image: url('{{ $item->picture ? asset('storage/' . $item->picture) : 'https://via.placeholder.com/600x400' }}');">
                        <div class="d-flex flex-column p-5 pb-3 text-white text-shadow-1">
                            <h3 class="fw-bold text-secondary">{{$item->title}}</h3>
                        </div>
                    </div>
                </div>
                @endforeach

                
            </div>
        </div>
    </div>