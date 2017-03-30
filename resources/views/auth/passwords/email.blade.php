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
            style="background-image: url('/uploads/register-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>dForgot?</h1>
                        <hr class="small">
                        <h2 class="subheading">Use your email to get back your DuStark Pass</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop


<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="col-xs-12 floating-label-form-group controls">
                            <label for="email">@lang('common.email_address')</label>

                                <input id="email" type="email" class="form-control" placeholder="@lang('common.email_address')" name="email" value="{{ old('email')?:'' }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
<div>&nbsp;</div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    @lang('common.send_reset')
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
