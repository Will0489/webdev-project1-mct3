<?php

class UserController extends \BaseController {

    public function profile()
    {
        if(Auth::check())
        {
            $data = Auth::user();
            return View::make('users.profile', array('data' => $data));
        } else {
            return Redirect::to('login');
        }
    }

	public function create()
	{
		return View::make('users.register');
	}

	public function store()
	{
        $data = Input::only(['username','email','photo','password']);

        // Image validation and storage
        if(Input::hasFile('photo'))
        {
            $file = Input::file('photo');
            $filename = 'avatar.jpg';
            $destpath = 'images/'.str_random(16).'/';

            $file->move($destpath, $filename);
            $data['photo'] = $destpath . $filename;
        } else {
            $data['photo'] = '';
        }
        $user = User::create($data);
        if ($user)
        {
            Auth::login($user);
            return Redirect::to('/profile');
        }

        return Redirect::back()->withInput()->withErrors(['Failed to register.']);
	}

	public function show($id)
	{
		$user = User::find($id);

        return View::make('users.detail', array('user' => $user));
	}

	public function edit($id)
	{
		$user = User::whereID($id)->firstOrFail();

        return View::make('users.edit')->withUser($user);
	}

	public function update($id)
	{
		$user = User::whereID($id)->firstOrFail();
        $data = Input::only('about', 'facebook', 'twitter', 'location', 'photo');

        // Image validation and storage
        if(Input::hasFile('photo'))
        {
            $file = Input::file('photo');
            $filename = 'avatar.jpg';
            $destpath = 'images/'.str_random(16).'/';

            $file->move($destpath, $filename);
            $data['photo'] = $destpath . $filename;
        } else {
            $data['photo'] = $user->photo;
        }

        $user->fill($data)->save();

        return Redirect::to('profile/{$user->id}');
	}

	public function destroy($id)
	{
		//TODO: Soft deleting of users
	}

}