<?php

class UpvoteController extends \BaseController {

    public function index()
    {
        $posts = Post::orderBy('created_at')->with(array('votes' => function($q)
        {
           $q->where('upvoted_by', '=', Auth::id());
        }))->get();

        return View::make('users.upvotes', compact('posts'));
    }

	public function store()
	{
		$upvote = new Upvote;
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
            $upvoted_post = Post::find($post);
            $upvoted_post['upvotes'] += 1;

            $upvoted_post->save();
        }
        return Redirect::back();
	}
}