<?php

class PostController extends \BaseController {

	public function index()
	{
		$posts = Post::orderBy('created_at', 'desc')->get();

        return View::make('posts.index', compact('posts'));
	}

	public function create()
	{
		return View::make('posts.submit');
	}

	public function store()
    {
        $data = Input::all();
        $user = Auth::id();

        $rules = ['title' => 'required', 'url' => 'required'];
        $feedback = [
            'title.required' => 'You need to enter a title.',
            'url.required' => 'You need to enter a url.'];

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
        $post = Post::with('user')->findOrFail($id);
        $user = User::with('posts');
        $upvote = Upvote::with('posts');

        return View::make('posts.detail', compact('post', 'user', 'upvote'));
	}
}