<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CommentController extends Controller
{
    protected $fields = [
        'content' => '',
        'publish_at' => '',
        'user_id' => 0,
        'post_id' => 0
    ];

    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
    }

    public function store(CommentRequest $request)
    {
        if (!Auth::user()->can('comment-create')) {
            setLanguage();
            return redirect($request->headers->get('referer') . '#comment-list')->withErrors([trans('common.blacklisted')]);
        }
        $comment = new Comment();
        //dd($request);
        foreach (array_keys($this->fields) as $field) {
            $comment->$field = $request->get($field);
        }
        //$fields['publish_at']=Carbon::now()->format('M-j-Y g:i A');
        //dd('hi');
        $comment->publish_at = Carbon::now();
        $comment->content = str_limit($comment->content, 500);
        $comment->save();
        //App::setLocale(Cookie::get('lang'));
        setLanguage();
        return redirect($request->headers->get('referer') . '#comment-list')->with("success", trans('common.comment_success'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $slug = $comment->post->slug;
        //$comment->post()->detach();
        //$comment->user()->detach();
        $comment->delete();
        setLanguage();
        return redirect('/blog/'.$slug. '#comment-list')->with("success", trans('common.comment_delete'));

    }

}
