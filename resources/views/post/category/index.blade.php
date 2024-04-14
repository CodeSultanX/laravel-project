@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Посты по категориям</h1>
        <section class="featured-posts-section">
            <div class="row">
                <div class="col-md-8">
                    @foreach ($posts as $post)
                    <div class="fetured-post blog-post" data-aos="fade-right">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                        </div>
                        <div class="blog-post-details">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $post->title }}</h6>
                                </a>
                                <div class="blog-post-like">
                                    <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="like-button border-0 bg-transparent">
                                            <span>{{ $post->liked_users_count }}</span>
                                            @if (auth()->check() && auth()->user()->likedPosts->contains($post->id))
                                            <i class="fas fa-heart text-danger"></i>
                                            @else
                                            <i class="far fa-heart"></i>
                                            @endif
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget">
                        <h5 class="widget-title">Категории</h5>
                        <div class="list-group">
                            @foreach ($categories as $category)
                            <a href="{{ route('post.category.index', $category->id) }}" class="list-group-item list-group-item-action">{{ $category->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
    </div>
</main>
@endsection
