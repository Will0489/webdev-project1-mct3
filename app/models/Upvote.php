<?php

class Upvote extends \Eloquent {

	protected $fillable = ['post_id', 'upvoted_by'];

    public function hasNotVoted($user, $post)
    {
        $upvotes = Upvote::where('post_id', '=', $post)->where('upvoted_by', '=', $user)->first();

        if($upvotes===NULL)
        {
            return true;
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