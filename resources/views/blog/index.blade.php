@extends('layouts.app')


@section('title', 'Page '.$posts->currentPage().' - ')

@section('content')

    <div class="page-header">
        <h1>{{ config('blog.title') }} <small>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</small></h1>
    </div>

    <ul>
        @foreach ($posts as $post)
            <ui>
                <h3><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                        <span class="label label-info">{{ $post->published_at }}</span></h3>
                <footer>
                    {{ str_limit($post->content, 320) }}
                </footer>
            </ui>
        @endforeach
    </ul>
    <hr>
    {!! $posts->render() !!}

@endsection
