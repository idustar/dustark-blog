@extends('blog.layouts.master', [
  'title' => $post->title]
)
@include("blog.layouts.lang")
@section('styles')
    <style>
        img{
            max-width:100%;
            height:auto;
        }
    </style>
@endsection
@section('page-header')
    <header class="intro-header"
            style="background-image: url('{{ page_image($post->page_image) }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>{{ $post->title }}</h1>
                        <h2 class="subheading">{{ $post->subtitle }}</h2>
                        <span class="meta">
              @lang('common.post_posted_on') {{ $post->published_at->format('G:i, F j, Y') }}
                            @if ($post->tags->count())
                                @lang('common.post_in')
                                {!! join(' ', $post->tagLinks()) !!}
                            @endif
            </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('content')

    {{-- The Post --}}
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {!! $post->content_html !!}
                </div>
            </div>
        </div>
    </article>

    {{-- The Pager --}}
    <div class="container">
        <div class="row">
            <ul class="pager">
                @if ($tag && $tag->reverse_direction)
                    @if ($post->olderPost($tag))
                        <li class="previous">
                            <a href="{!! $post->olderPost($tag)->url($tag) !!}">
                                <i class="fa fa-long-arrow-left fa-lg"></i>
                                @lang('common.Previous') {{ $tag->tag?: trans('common.Post') }}
                            </a>
                        </li>
                    @endif
                    @if ($post->newerPost($tag))
                        <li class="next">
                            <a href="{!! $post->newerPost($tag)->url($tag) !!}">
                                @lang('common.Next') {{ $tag->tag?: trans('common.Post')  }}
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </li>
                    @endif
                @else
                    @if ($post->newerPost($tag))
                        <li class="previous">
                            <a href="{!! $post->newerPost($tag)->url($tag) !!}">
                                <i class="fa fa-long-arrow-left fa-lg"></i>
                                @lang('common.Previous') {{ $tag ? $tag->tag : trans('common.Post') }}
                            </a>
                        </li>
                    @endif
                    @if ($post->olderPost($tag))
                        <li class="next">
                            <a href="{!! $post->olderPost($tag)->url($tag) !!}">
                                @lang('common.Next') {{ $tag ? $tag->tag : trans('common.Post') }}
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
        @include('blog.comment.index')
        @include('blog.comment.publish')
    </div>




@stop