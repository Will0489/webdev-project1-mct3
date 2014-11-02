<?php

class SessionController extends \BaseController {

	public function index()
	{
		if (!Auth::check()) return Redirect::to('/');

        $data = Auth::user();
        return View::make('home', array('data'=>$data));
	}

	public function create()
	{
        if (Auth::check()) return Redirect::to('/');

		return View::make('sessions.create');
	}

	public function store()
	{
		if (Auth::attempt(Input::only('username', 'password')))
        {
            return Redirect::to('/profile');
        }

        return Redirect::back()->withInput()->withErrors(['Invalid username/password.']);
    }

	public function destroy()
	{
		Auth::logout();

        return Redirect::to('login')->with('message', 'You have been logged out.');
	}

}