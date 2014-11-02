<?php

class Comment extends \Eloquent {
	protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo('User', 'comment_by');
    }

    public function post()
    {
        return $this->belongsTo('Post');
    }
}