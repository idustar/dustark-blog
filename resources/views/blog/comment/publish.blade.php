@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<link href="/css/smohan.face.css" type="text/css" rel="stylesheet">

<div class="row" id="commentForm">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        @if(Auth::guest())
            <div>&nbsp;</div>
            <div class="alert alert-danger text-center" role="alert"><h5>@lang('comment.need_login')<a href="/login">@lang('comment.to_login')</a>? <a href="/register">@lang('comment.to_register')</a>?</h5></div>
        @else
        @cannot('comment-create')
                <div class="alert alert-danger text-center" role="alert"><h5>@lang('comment.in_blacklist')</h5></div>
            @else
                <form class="form-horizontal" role="form" method="POST" action="/comment">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="row control-group">
                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }} col-xs-12 floating-label-form-group controls" id="mojibox">
                        <label id="content-label" for="content">@lang('comment.Comment')</label>
                        <textarea rows="3" class="form-control" placeholder="@lang('comment.comment_placeholder')" name="content" id="content"></textarea>

                            <a href="javascript:void(0)" class="face" title="表情"></a><span class="help-block text-danger"></span>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-default">@lang('common.Submit')</button>
                    </div>
                </div>
            </form>
            @endcan
        @endif
    </div>
</div>
</div>

@section('styles')
@endsection



@section('scripts')
    <script type="text/javascript" src="/js/smohan.face.js"></script>
<script type="text/javascript">
    $(function() {

        $("a.face").smohanfacebox({
            Event : "click",	//触发事件
            divid : "mojibox", //外层DIV ID
            textid : "content" //文本框 ID
        });
        console.log('b');

        $('#comment-list').replaceface($('#comment-list').html());
        console.log($('#comment-list').html());
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
    }

    );


    //$('#Smohan_Showface').click(function() {
    //    $('#Zones').fadeIn(360);
     //   $('#Zones').html($('#content').val());
    //    $('#Zones').replaceface($('#Zones').html());//替换表情
   // });


</script>
@endsection
