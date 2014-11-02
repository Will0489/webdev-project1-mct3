<?php

class Upvote extends \Eloquent {

	protected $fillable = ['post_id', 'upvoted_by'];

    public function hasVoted($user, $post)
    {
        $upvotes = Vote::where('post_id', '=', $post)->where('upvoted_by', '=', $user)->first();

        if($upvotes===NULL)
        {
            $newpost = new Post;
            return $newpost->upvote($post);
        }
        else
        {
            return false;
        }
    }

    public function user()
    {
        return $this->belongsTo('User', 'upvoted_by');
    }

    public function post()
    {
        return $this->belongsTo('Post');
    }
}