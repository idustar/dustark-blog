<?php

namespace App\Http\Controllers;

    use App\Jobs\BlogIndexData;
    use App\Http\Requests;
    use App\Post;
    use App\Tag;
    use App\Comment;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Cookie;

    class BlogController extends Controller
{





    /**
     * Return data for normal index page
     *
     * @return array
     */
    protected function normalIndexData()
    {
        $posts = Post::with('tags')
            ->where('published_at', '<=', Carbon::now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->simplePaginate(config('blog.posts_per_page'));

        return [
            'title' => config('blog.title'),
            'subtitle' => config('blog.subtitle'),
            'posts' => $posts,
            'page_image' => config('blog.page_image'),
            'meta_description' => config('blog.description'),
            'reverse_direction' => false,
            'tag' => null,
        ];
    }

    /**
     * Return data for a tag index page
     *
     * @param string $tag
     * @return array
     */
    protected function tagIndexData($tag)
    {
        $tag = Tag::where('tag', $tag)->firstOrFail();
        $reverse_direction = (bool)$tag->reverse_direction;

        $posts = Post::where('published_at', '<=', Carbon::now())
            ->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            })
            ->where('is_draft', 0)
            ->orderBy('published_at', $reverse_direction ? 'asc' : 'desc')
            ->simplePaginate(config('blog.posts_per_page'));
        $posts->addQuery('tag', $tag->tag);

        $page_image = $tag->page_image ?: config('blog.page_image');

        return [
            'title' => $tag->title,
            'subtitle' => $tag->subtitle,
            'posts' => $posts,
            'page_image' => $page_image,
            'tag' => $tag,
            'reverse_direction' => $reverse_direction,
            'meta_description' => $tag->meta_description ?: config('blog.description'),
        ];
    }





    //main

    public function index(Request $request)
    {
        $tag = $request->get('tag');
        //$data = $this->dispatch(new BlogIndexData($tag));
        $data = ($tag) ? $this->tagIndexData($tag) : $this->normalIndexData();
        $layout = $tag ? Tag::layout($tag)[0] : 'blog.layouts.index';
        //setLanguage();
        return view($layout, $data);
    }

    public function indexByTag($tag)
    {
        $data = ($tag) ? BlogController::tagIndexData($tag) : BlogController::normalIndexData();
        $layout = $tag ? Tag::layout($tag)[0] : 'blog.layouts.index';
        //dd($layout);
        //setLanguage();
        return view($layout, $data);
    }

    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }
        $comments = \Illuminate\Support\Facades\DB::table('comments')->where('post_id',$post->id)->orderBy('publish_at', 'desc')
            ->simplePaginate(config('blog.comments_per_page'));
        $comments_count = $post->comments->count();
        //dd(compact('post', 'tag', 'comments','comments_count'));
        //setLanguage();
        return view($post->layout, compact('post', 'tag', 'comments','comments_count'));
    }

}