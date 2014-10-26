<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

    public function profile()
    {
        if(Auth::check())
        {
            $data = Auth::user();
            return View::make('users.profile', array('data' => $data));
        } else {
            return View::make('error.guest');
        }
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.register');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = Input::only(['username','email','photo','password']);
        if(Input::hasFile('photo'))
        {
            $file = Input::file('photo');
            $filename = $file->getClientOriginalName();
            $destpath = 'images/'.str_random(8).'/';

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

	/**
	 * Display the specified resource.
	 * GET /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}