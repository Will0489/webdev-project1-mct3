<?php

class UpvoteController extends \BaseController {

	public function store()
	{
		$upvote = new Vote;
        $data = Input::all();
        $user = Auth::id();
        $post = $data['post_id'];

        $hasVoted = $upvote->hasVoted($user, $post);

        if($hasVoted)
        {
            $upvote->create([
                'post_id' => $post,
                'upvoted_by' => $user
            ]);
        }
        return Redirect::back();
	}
}