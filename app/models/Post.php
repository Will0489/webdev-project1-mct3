<?php

class Post extends \Eloquent {

	protected $fillable = ['title', 'url', 'posted_by'];
    protected $guarded = ['id'];

    /*public function upvote($id)
    {
        $post = Post::find($id);
        $upvote = $post->upvotes;
        $upvote += 1;

        return $post->update(array('upvotes' => $upvote)); OBSOLETE
    }*/

    public function user()
    {
        return $this->belongsTo('User', 'posted_by');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public function votes()
    {
        return $this->hasMany('Upvote');
    }
}