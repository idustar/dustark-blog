

<div class="row" id="comment-list">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <br><br><h3>@lang('comment.Comment') ({{$comments_count}})</h3>
        <hr>
        @include('admin.partials.success')
        @include('admin.partials.errors')
        @if($comments_count==0)
            <div class="alert alert-warning text-center" role="alert"><h5>@lang('comment.no_comment') <a href="#commentForm">@lang('comment.be_first_comment')</a></h5></div>
        @else
            @foreach($comments as $comment)
                    <h4 class='text-info'>
                        <span class="hidden-xs hidden-sm"> &nbsp; &nbsp; &nbsp; </span>
                        <span class="glyphicon glyphicon-user"></span> {{\App\User::find($comment->user_id)->name}}
                    @if(\App\User::find($comment->user_id)->usergroup=='administrator')
                        <span class="label label-success">@lang('auth.admin')</span>
                        @elseif(\App\User::find($comment->user_id)->usergroup=='forbidden')
                            <span class="label label-danger">@lang('auth.forbidden')</span>
                    @endif
                    <span class="label label-primary">{{timeFormat(new Carbon\Carbon($comment->publish_at))}}</span>
                        <span class="label label-primary" style="float: right">{{$comments_count+1-(($comments->currentPage()-1)*config('blog.comments_per_page')+$loop->index+1)}}#</span>
                        @if(!Auth::guest())
                            @if(Auth::user()->usergroup=='administrator'||(Auth::user()->id==$comment->user_id))
                                <span id='deletebt' class="label label-danger" style="float: right" data-toggle="modal" data-target="#modal-delete" onclick="$('#deletecomfirm').attr('action', '/comment/{{$comment->id}}');"}>@lang('common.delete')</span>
                        @endif

                                <span id='replybt' class="label label-warning" style="float: right" onclick="$('#content').html('Reply to '+{{$comments_count+1-(($comments->currentPage()-1)*config('blog.comments_per_page')+$loop->index+1)}}+'#: \n');
                                        $('#content-label').html('Reply to '+{{$comments_count+1-(($comments->currentPage()-1)*config('blog.comments_per_page')+$loop->index+1)}}+'#:');
                                        location.href='#content'">Reply</span>
                        @endif

                        </h4>
                <p class="comment-content col-md-offset-1" style="word-wrap:break-word">{{$comment->content}}</p>
            @endforeach
        @endif
    </div>
</div>


{{-- 分页 --}}
@if(!($comments->currentPage() == 1 && !$comments->hasMorePages()))
<ul class="pager row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        @if ($comments->currentPage() > 1)
            <span class="previous">
                <a href="{!! $comments->url($comments->currentPage() - 1) !!}#comment-list">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                </a>
            </span>
        @endif
            <span class="label label-primary text-center">{{trans('common.PAGE',['num'=>$comments->currentPage()])}}</span>
        @if ($comments->hasMorePages())
            <span class="next">

                <a href="{!! $comments->nextPageUrl() !!}#comment-list">
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </a>
            </span>
        @endif
    </div>
</ul>
@endif






{{-- 确认删除 --}}
<div class="modal fade" id="modal-delete" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    ×
                </button>
                <h4 class="modal-title">@lang('comment.delete_confirm_header')</h4>
            </div>
            <div class="modal-body">
                <p class="lead">
                    <i class="fa fa-question-circle fa-lg"></i>
                    @lang('comment.delete_confirm')
                </p>
            </div>
            <div class="modal-footer">
                <form id="deletecomfirm" method="POST" action="hi">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('common.Close')</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-times-circle"></i> @lang('common.Yes')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>







