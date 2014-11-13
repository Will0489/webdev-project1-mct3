<?php

use Carbon\Carbon;

class PostController extends \BaseController {

	public function index()
	{
        $today = array(
            Carbon::now()->setTime(00,00,00),
            Carbon::now()->setTime(23,59,59)
        );
		$posts = Post::orderBy('created_at', 'desc')->whereBetween('created_at', $today)->with(array('votes' => function($query)
        {
            $query->where('upvoted_by', '=', Auth::id());
        }))->get();

        return View::make('posts.index', compact('posts'));
	}

    public function top()
    {
        $posts = Post::orderBy('upvotes', 'desc')->with('votes')->get();

        return View::make('posts.top', compact('posts'));
    }

	public function create()
	{
		return View::make('posts.submit');
	}

	public function store()
    {
        $data = Input::all();
        $user = Auth::id();

        $rules = [
            'title' => 'required',
            'url' => 'required'
        ];
        $feedback = [
            'title.required' => 'You need to enter a title.',
            'url.required' => 'You need to enter a url.'
        ];

        $validator = Validator::make(Input::all(), $rules, $feedback);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        else
        {
            Post::create([
                'title' => $data['title'],
                'url' => $data['url'],
                'posted_by' => $user
            ]);
        }
        return Redirect::to('/news');

    }

	public function show($id)
	{
        $post = Post::with('user', 'comments')->findOrFail($id);

        return View::make('posts.detail', compact('post'));
	}
}