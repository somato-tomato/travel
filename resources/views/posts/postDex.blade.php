{{--@extends('head.layouts.app')--}}
@extends('head.head')

@section('content')
    @include('head.navs.navbar')
    <br/><br/><br/><br/>
    <div class="container">

        @if($data['posts']->count() > 0)
            @foreach($data['posts'] as $post)
                @if($loop->first)
                    <div class="jumbotron p-4 p-md-5 text-white rounded @if(empty($post->featured_image)) bg-dark @endif"
                         @if(!empty($post->featured_image)) style="background: linear-gradient(rgba(23, 25, 65, 0.85),rgba(23, 25, 65, 0.85)),url({{ $post->featured_image }}); background-size: cover" @endif>
                        <div class="col-md-8 px-0">
                            <h1 class="font-italic font-serif">
                                <a href="{{ url('/', $post->slug) }}" class="text-white text-decoration-none">{{ $post->title }}</a>
                            </h1>
                            <h4 class="my-3">
                                <a href="{{ url('/', $post->slug) }}" class="text-white text-decoration-none">{{ $post->summary }}</a>
                            </h4>
                            <p class="lead mb-0" style="font-size: 18px">
                                <a href="{{ url('/', $post->slug) }}" class="text-white font-weight-bold text-decoration-none">Lanjutkan membaca . . .</a>
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>

    <main role="main" class="container @if($data['posts']->count() == 0) mt-4 @endif">
        <div class="row">
            <div class="col-md-8">
                <h3 class="mb-4 font-italic @if($data['posts']->count() > 0) pb-4 border-bottom @endif font-serif">
                    {{ __('canvas::blog.posts.label') }}
                </h3>
                @if($data['posts']->count() > 0)
                    @foreach($data['posts'] as $post)
                        @if(!$loop->first)
                            <div class="mb-5">
                                <h3>
                                    <a href="{{ url('/', $post->slug) }}" class="font-serif text-white text-decoration-none">{{ $post->title }}</a>
                                </h3>
                                <p class="text-muted mb-2">{{ $post->published_at->formatLocalized('%b %d') }} — {{ $post->read_time }}</p>
                                <p>
                                    <a href="{{ url('/', $post->slug) }}" class="text-white text-decoration-none">{{ $post->summary }}</a>
                                </p>
                            </div>
                        @endif
                    @endforeach
                    {{ $data['posts']->links() }}
                @else
                    <p class="mt-4">No posts were found
                    </p>
                @endif
            </div>

            @if($data['tags'] && $data['topics'])
                <aside class="col-md-4">
                    <div class="p-md-4">
                        <h4 class="font-italic font-serif">{{ __('canvas::blog.tags.label') }}</h4>
                        <ol class="list-unstyled mb-0">
                            @foreach($data['tags'] as $tag)
                                <li>
                                    <a href="{{ url('/tag', $tag->slug) }}" class="text-decoration-none text-secondary">{{ $tag->name }}</a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                    <div class="p-md-4">
                        <h4 class="font-italic font-serif">Topics</h4>
                        <ol class="list-unstyled mb-0">
                            @foreach($data['topics'] as $topic)
                                <li>
                                    <a href="{{ url('/topic', $topic->slug) }}" class="text-decoration-none text-secondary">{{ $topic->name }}</a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </aside>
            @endif
        </div>
    </main>
@endsection
