<?php

class Comment extends \Eloquent {
	protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function post()
    {
        return $this->belongsTo('Post');
    }
}