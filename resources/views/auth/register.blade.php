@extends('blog.layouts.master', [
  'title' => config('blog.title'),
  'meta_description' => config('blog.description'),
])
@include("blog.layouts.lang")
@section('styles')
    <style>
        .panel {
            font-family: "Helvetica Neue Light", "HelveticaNeue-Light", "Helvetica Neue", Calibri, Helvetica, Arial, sans-serif;
        }
    </style>
@endsection

@section('page-header')
    <header class="intro-header"
            style="background-image: url('/uploads/registers-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>@lang('common.register')</h1>
                        <hr class="small">
                        <h2 class="subheading">@lang('common.register_header')</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="col-xs-12 floating-label-form-group controls">
                            <label for="name">@lang('common.name')</label>
                                <input id="name" type="text" class="form-control" name="name" placeholder="@lang('common.name')"value="{{ old('name')?:'' }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="col-xs-12 floating-label-form-group controls">
                            <label for="email">@lang('common.email_address')</label>

                                <input id="email" type="email" class="form-control" placeholder="@lang('common.email_address')" name="email" value="{{ old('email')?:'' }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="col-xs-12 floating-label-form-group controls">
                            <label for="password">@lang('common.password')</label>

                                <input id="password" type="password" class="form-control" placeholder="@lang('common.password')" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="col-xs-12 floating-label-form-group controls">
                            <label for="password-confirm">@lang('common.confirm_password')</label>
                                <input id="password-confirm" type="password" placeholder="@lang('common.confirm_password')" class="form-control" name="password_confirmation" required>
                        </div>
                        <div>&nbsp;</div>
                        <div class="row form-group">

                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    @lang('common.register')
                                </button>
                            </div>
                        </div>
                    </form>

        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script>
        $(function() {

            $("body").on("input propertychange", ".floating-label-form-group", function(o) {
                $(this).toggleClass("floating-label-form-group-with-value", !!$(o.target).val())
            }).on("focus", ".floating-label-form-group", function() {
                $(this).addClass("floating-label-form-group-with-focus")
            }).on("blur", ".floating-label-form-group", function() {
                $(this).removeClass("floating-label-form-group-with-focus")
            })
        }), jQuery(document).ready(function(o) {
                var s = 1170;
                if (o(window).width() > s) {
                    var i = o(".navbar-custom").height();
                    o(window).on("scroll", {
                        previousTop: 0
                    }, function() {
                        var s = o(window).scrollTop();
                        s < this.previousTop ? s > 0 && o(".navbar-custom").hasClass("is-fixed") ? o(".navbar-custom").addClass("is-visible") : o(".navbar-custom").removeClass("is-visible is-fixed") : s > this.previousTop && (o(".navbar-custom").removeClass("is-visible"), s > i && !o(".navbar-custom").hasClass("is-fixed") && o(".navbar-custom").addClass("is-fixed")), this.previousTop = s
                    })
                }
                $('.checkbox').bootstrapSwitch();
            }
        );

    </script>
@endsection