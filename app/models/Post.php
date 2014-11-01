<?php

class Post extends \Eloquent {
	protected $fillable = ['title', 'url'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public function upvotes()
    {
        return $this->hasMany('Upvote');
    }
}