@extends('layouts.welcome')

@section('container')
    <div class="container secondary shadow">
        <div class="row g-5">
            <div class="col-md-12">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Berita
                </h3>

                <article class="blog-post">
                    

                    @foreach ($posts as $post)
                    <h2 href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</h2>
                    <tag class="primary mb-2">{{ $posts[0]->created_at->format('d M Y') }}</tag>
                        <p>{{ $post->content }}</p>
                        <hr>
                    @endforeach

                </article>

                <nav class="blog-pagination" aria-label="Pagination">
    @if ($posts->onFirstPage())
        <a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">Newer</a>
    @else
        <a class="btn btn-outline-primary rounded-pill" href="{{ $posts->previousPageUrl() }}">Newer</a>
    @endif

    @if ($posts->hasMorePages())
        <a class="btn btn-outline-primary rounded-pill" href="{{ $posts->nextPageUrl() }}">Older</a>
    @else
        <a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">Older</a>
    @endif
</nav>


            </div>

            
        </div>
    </div>
@endsection
