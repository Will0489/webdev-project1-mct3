<?php

Route::resource('user', 'UserController');
Route::resource('sessions', 'SessionController');
Route::resource('post', 'PostController');
Route::resource('comment', 'CommentController');
Route::resource('upvote', 'UpvoteController');

Route::get('/', function()
{
    $data = array();

    if (Auth::check()) {
        $data = Auth::user();
    }
    return View::make('pages.home', array('data'=>$data));
});

Route::get('login', 'SessionController@create');
Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/')->with('message', 'You have been logged out.');

});
Route::get('register', 'UserController@create')->before('guest');
Route::post('register', 'UserController@store');
Route::get('news', 'PostController@home');
Route::get('news/{id}', 'PostController@detail');
Route::get('comments', 'CommentController@home');
Route::post('comments/new', 'CommentController@create');
Route::get('submit', 'PostController@create')->before('auth');

// Facebook routes
Route::get('login/fb', function() {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    );
    return Redirect::away($facebook->getLoginUrl($params));
});

/*
// Display FB user info as object
Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    dd($me);
});*/

Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

        $user = new User;
        $user->username = $me['first_name'].' '.$me['last_name'];
        // $user->password = Hash::make($me['id'];
        $user->email = $me['email'];
        $user->photo = 'https://graph.facebook.com/'.$me['id'].'/picture?type=large';

        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('/')->with('message', 'Logged in with Facebook. ');
});
