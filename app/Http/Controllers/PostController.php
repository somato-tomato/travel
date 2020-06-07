<?php

namespace App\Http\Controllers;

use Canvas\Canvas;
use Canvas\Topic;
use Canvas\Tag;
use Canvas\Events\PostViewed;
use Illuminate\Support\Str;
use Canvas\UserMeta;
use Canvas\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metaData = UserMeta::forCurrentUser()->first();
        $emailHash = md5(trim(Str::lower(optional(request()->user())->email)));

        $data = [
            'avatar' => optional($metaData)->avatar && !empty(optional($metaData)->avatar) ? $metaData->avatar : "https://secure.gravatar.com/avatar/{$emailHash}?s=500",
            'posts'  => Post::published()->orderByDesc('published_at')->simplePaginate(3),
            'topics' => Topic::all(['name', 'slug']),
            'tags'   => Tag::all(['name', 'slug']),
        ];

        return view('posts.postDex', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $posts = Post::with('tags', 'topic')->published()->get();
        $post = $posts->firstWhere('slug', $slug);

        if ($post && $post->published) {
            $readNext = $posts->sortBy('published_at')->firstWhere('published_at', '>', $post->published_at);

            if ($readNext) {
                $randomPool = $posts->filter(function ($item) use ($readNext, $post) {
                    return $item->id != $post->id && $item->id != $readNext->id;
                });
            } else {
                $randomPool = $posts->filter(function ($item) use ($readNext, $post) {
                    return $item->id != $post->id;
                });
            }

            $metaData = UserMeta::forCurrentUser()->first();
            $emailHash = md5(trim(Str::lower(optional(request()->user())->email)));

            $uavatar = DB::table('canvas_user_meta')
            ->join('canvas_posts', 'canvas_user_meta.user_id', '=', 'canvas_posts.user_id')
            ->select('canvas_user_meta.avatar', 'canvas_user_meta.summary')
            ->where([
                ['canvas_posts.user_id', '=', $post->user_id],
                ['canvas_posts.slug', '=', $post->slug],
            ])
            ->first();

            //ddd($uavatar->summary);

            $data = [
                'avatar' => optional($uavatar)->avatar && !empty(optional($uavatar)->avatar) ? $uavatar->avatar : "https://secure.gravatar.com/avatar/{$emailHash}?s=500",
                'summary' => $uavatar->summary,
                'author' => $post->user,
                'post'   => $post,
                'meta'   => $post->meta,
                'topic'  => $post->topic->first() ?? null,
            ];

            //ddd($data['avatar']);


            event(new PostViewed($post));

            return view('posts.showPost', compact('data'));
        } else {
            abort(404);
        }
    }

    public function getPostsByTag($slug)
    {
        if (Tag::where('slug', $slug)->first()) {
            $metaData = UserMeta::forCurrentUser()->first();
            $emailHash = md5(trim(Str::lower(optional(request()->user())->email)));

            $data = [
                'avatar' => optional($metaData)->avatar && !empty(optional($metaData)->avatar) ? $metaData->avatar : "https://secure.gravatar.com/avatar/{$emailHash}?s=500",
                'tag'    => Tag::with('posts')->where('slug', $slug)->first(),
                'tags'   => Tag::all(['name', 'slug']),
                'topics' => Topic::all(['name', 'slug']),
                'posts'  => Post::whereHas('tags', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->published()->orderByDesc('published_at')->simplePaginate(10),
            ];

            return view('posts.postDex', compact('data'));
        } else {
            abort(404);
        }
    }
    public function getPostsByTopic(string $slug)
    {
        if (Topic::where('slug', $slug)->first()) {
            $metaData = UserMeta::forCurrentUser()->first();
            $emailHash = md5(trim(Str::lower(optional(request()->user())->email)));

            $data = [
                'avatar' => optional($metaData)->avatar && !empty(optional($metaData)->avatar) ? $metaData->avatar : "https://secure.gravatar.com/avatar/{$emailHash}?s=500",
                'tags'   => Tag::all(['name', 'slug']),
                'topics' => Topic::all(['name', 'slug']),
                'topic'  => Topic::with('posts')->where('slug', $slug)->first(),
                'posts'  => Post::whereHas('topic', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->published()->orderByDesc('published_at')->simplePaginate(10),
            ];

            return view('posts.postDex', compact('data'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
