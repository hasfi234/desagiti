@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="blog-post">
                <!-- Blog Post Title -->
                <h1>{{ $post->title }}</h1>

                <!-- Blog Post Meta Data -->
                <p class="text-muted">
                    Published on {{ $post->created_at->format('F d, Y') }}
                    by {{ $post->author->name ?? 'Unknown' }}
                </p>

                <!-- Blog Post Image -->
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3">
                @endif

                <!-- Blog Post Content -->
                <div class="content">
                    {!! $post->content !!}
                </div>

                <!-- Blog Post Tags -->
                @if($post->tags->count())
                    <div class="tags mt-4">
                        <strong>Tags:</strong>
                        @foreach($post->tags as $tag)
                            <a href="{{ route('blog.tag', $tag->slug) }}" class="badge bg-primary text-white">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                @endif

                <!-- Blog Post Comments -->
                <div class="comments mt-5">
                    <h3>Comments</h3>
                    @if($post->comments->count())
                        <ul class="list-unstyled">
                            @foreach($post->comments as $comment)
                                <li class="mb-4">
                                    <strong>{{ $comment->user->name }}</strong> 
                                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                                    <p>{{ $comment->body }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No comments yet. Be the first to comment!</p>
                    @endif
                </div>

                <!-- Comment Form -->
                <div class="mt-4">
                    <h4>Leave a Comment</h4>
                    <form action="{{ route('comments.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
