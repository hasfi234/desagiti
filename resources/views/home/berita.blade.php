<div id="banner">
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner rounded-5 shadow">
                <h3 class="lead display-1 position-absolute top-50 start-50 translate-middle" id="demo">
                    <script>
                        var i = -1;
                        var txt = 'Desa Giti'; /* The text */
                        var speed = 100; /* The speed/duration of the effect in milliseconds */

                        function typeWriter() {
                            if (i < txt.length) {
                                document.getElementById("demo").innerHTML += txt.charAt(i);
                                i++;
                                setTimeout(typeWriter, speed);
                            }
                        }
                        typeWriter();
                    </script>
                </h3>
                <div class="carousel-item active">
                    <img src="https://giti.hoscloud.net/storage/facility/slides/1692334375.jpeg"
                        class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://giti.hoscloud.net/storage/facility/slides/1692334382.jpeg"
                        class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://giti.hoscloud.net/storage/facility/slides/1692334455.jpeg"
                        class="d-block w-100 img-fluid" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="plugins">
        <div class="p-3 rounded-4 container-fluid coloumn secondary shadow">
            <div class="row justify-content-center g-3">
                <a href="/#potensi" class="col-6 col-md-3"><button class="btn btn-light link-secondary w-100">Potensi</button></a>
                <a href="/#kontak" class="col-6 col-md-3"><button class="btn btn-light link-secondary w-100">Geografis</button></a>
                <a href="/news" class="col-6 col-md-3"><button class="btn btn-light link-secondary w-100">Informasi</button></a>
                <a href="/#sarana" class="col-6 col-md-3"><button class="btn btn-light link-secondary w-100">Fasilitas</button></a>
            </div>
        </div>
    </div>
    <!-- Berita Section -->
<div id="berita">
    <div class="container column secondary shadow">
        <div class="py-3">
            <h5>Berita</h5>
            <a href="/news" class="small muted">Lihat semua...</a>
        </div>

        @if($posts->count())
            <div class="custom-bg p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary" style="background-image: url('{{ $posts[0]->picture ? asset('storage/' . $posts[0]->picture) : 'https://via.placeholder.com/600x400' }}'); background-size:cover;">
                <div class="col-lg-6 px-0">
                    <h1 class="display-4 fst-italic text-secondary">{{ $posts[0]->title }}</h1>
                    <div>
                        <tag class="primary">{{ $posts[0]->created_at->format('d M Y') }}</tag>
                    </div>
                    <p class="lead my-3">{{ Str::limit($posts[0]->content, 100) }}</p>
                    <p class="lead mb-0"><a href="/news" class="text-body-emphasis fw-bold">Continue reading...</a></p>
                </div>
            </div>

            <div class="row d-flex mb-2">
                @foreach($posts->skip(1)->take(2) as $post)
                    <div class="col-md-6 d-flex">
                        <div class="custom-bg row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
                             style="background-image: url('{{ $post->picture ? asset('storage/' . $post->picture) : 'https://via.placeholder.com/600x400' }}'); background-size:cover;">
                            <div class="overlay p-4 d-flex flex-column position-static">
                                <h4 class="mb-0 text-secondary">{{ Str::limit($post->title, 40) }}</h4>
                                <div>
                                    <tag class="my-2 primary">{{ $post->created_at->format('d M Y') }}</tag>
                                </div>
                                <p class="card-text mb-auto">{{ Str::limit($post->content, 100) }}</p>
                                <a href="/news" class="icon-link gap-1 icon-link-hover stretched-link">
                                    Continue reading
                                    <svg class="bi">
                                        <use xlink:href="#chevron-right"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No news available at the moment.</p>
        @endif
    </div>
</div>