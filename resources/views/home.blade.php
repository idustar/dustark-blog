@extends('layouts.app')


@section('title', 'Home - ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">DuStark Pass</div>

                <div class="panel-body">
                    You are logged in! Thank you for being a menber of {{ config('blog.title', 'DuStark.cn') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
