@extends('layouts.main')

@section('content')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> {{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }} * {{ $date->format('H : i') }} • {{ $post->comments->count() }} Comments</p>
        <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ asset( 'storage/' .$post->preview_image ) }}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                    {!! $post->content !!}
                </div>
            </div>
       
        </section>
        <section class="col-lg-9 mx-auto py-4">
            @auth
                <form action="{{ route('post.like.store',$post->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="border-0 bg-transparent">
                        <span>{{ $post->liked_users_count }}</span>
                            @if (auth()->user()->likedPosts->contains($post->id))
                            <i class="fas fa-heart text-danger"></i>
                            @else
                            <i class="far fa-heart"></i>
                            @endif
                    </button> 
                </form>
            @endauth

            @guest
                <button type="submit" class="border-0 bg-transparent">
                    <span>{{ $post->liked_users_count }}</span>
                    <i class="far fa-heart"></i>
                </button> 
            @endguest
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                @if ($relatedPosts->count() > 0)
                <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                    <div class="row">
                        @foreach ($relatedPosts as $relatedPost )
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ asset( 'storage/' .$relatedPost->preview_image ) }}" alt="related post" class="post-thumbnail">
                            <p class="post-category">{{ $relatedPost->category->title }}</p>
                            <a href="{{ route('post.show',$relatedPost->id) }}"><h5 class="post-title">{{ $relatedPost->title }}</h5></a>
                        </div>
                        @endforeach
                       
                    </div>
                </section>
                @endif
               
                <div class="card-comment  mb-4">
                    <h2 class="section-title mb-5" data-aos="fade-up">Комментарий({{ $post->comments->count() }})</h2>
                    @foreach ($post->comments as $comment )
                    
                    <div class="comment-text mb-3">
                      <span class="username">
                        <div>
                            {{ $comment->User->name}}
                        </div>
                  
                        <span class="text-muted float-right">{{ $comment->date_as_carbon->diffForHumans() }}</span>
                      </span><!-- /.username -->
                     {{$comment->message}}
                    </div>
                    @endforeach
    
                </div>
                @auth
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий</h2>
                    <form action="{{ route('post.comment.store',$post->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                           
                                <textarea name="message" id="comment" class="form-control" placeholder="Комментарий..." rows="10"></textarea>
                                @error('message')
                                    <div class="text-danger pt-3">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Отправить" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
                @endauth
                
            </div>
        </div>
    </div>
</main>
@endsection