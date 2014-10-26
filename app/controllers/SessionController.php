<?php

class SessionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /session
	 *
	 * @return Response
	 */
	public function index()
	{
		if (!Auth::check()) return Redirect::to('/');

        $data = Auth::user();
        return View::make('home', array('data'=>$data));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /session/create
	 *
	 * @return Response
	 */
	public function create()
	{
        if (Auth::check()) return Redirect::to('/');

		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /session
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Auth::attempt(Input::only('username', 'password')))
        {
            return Redirect::to('/profile');
        }

        return Redirect::back()->withInput()->withErrors(['Invalid username/password.']);
    }

	/**
	 * Display the specified resource.
	 * GET /session/{id}
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
	 * GET /session/{id}/edit
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
	 * PUT /session/{id}
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
	 * DELETE /session/{id}
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

        return Redirect::route('login');
	}

}