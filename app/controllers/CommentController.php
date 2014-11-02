<?php

class CommentController extends \BaseController {

	public function store()
	{
        $data = Input::all();
        $user = Auth::id();

        $rules = ['body' => 'required'];
        $feedback = ['body.required' => 'Your comment cannot be empty!'];

        $validator = Validator::make(Input::all(), $rules, $feedback);

        if($validator->fails())
        {
            return Redirect::to(URL::previous() . '#comment')->withInput()->withErrors($validator);
        }
        else
        {
            Comment::create([
                'body' => $data['body'],
                'post_id' => $data['post_id'],
                'comment_by' => $user
            ]);
        }
        return Redirect::back();
	}

}