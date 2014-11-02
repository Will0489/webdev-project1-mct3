<?php

class UpvoteController extends \BaseController {

    public function index()
    {
        $posts = Post::with(array('upvote' => function(query)
        {
            $query->where()
        }))->get();
        //$posts = Post::orderBy('created_at', 'desc')->get();

        return View::make('posts.index', compact('posts'));
        return View::make('users.upvotes', compact('posts'));
    }

	public function store()
	{
		$upvote = new Vote;
        $data = Input::all();
        $user = Auth::id();
        $post = $data['post_id'];

        $hasNotVoted = $upvote->hasNotVoted($user, $post);

        if($hasNotVoted)
        {
            $upvote->create([
                'post_id' => $post,
                'upvoted_by' => $user
            ]);
        }
        return Redirect::back();
	}
}