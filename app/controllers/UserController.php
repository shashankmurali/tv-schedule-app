<?php

class UserController extends BaseController {

	

	public function getLogin()
	{
    	  	return View::make('user.login');
	}

	public function postLogin()
	{
	  $rules = array(
	    'email' => 'required|email|exists:users,email',
	    'password' => 'required|min:6',
	    );

	  $validator = Validator::make(Input::all(), $rules);

	  if ($validator->fails())
	  {
	  	return Redirect::to('user/login')->withInput(Input::only('email'));
	  }
	  else
	  {
	    if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
	    {
	    	Log::debug('Authentication successful. Credentials are valid.');

				$user = Auth::user();
				$full_name = $user->getFullName();
				Session::put('full_name', $full_name);

	    	return Redirect::to('user/dashboard');
	    }
	    else
	    {
	    	Log::debug('Authentication failure.');

	    	Session::put('message', 'Incorrect credentials.');

	    	return Redirect::to('user/login')->withInput(Input::only('email'));
	    }
	  }
	}

	public function getRegister()
	{
    		return View::make('user.register');
	}

	public function postRegister()
	{
	  $rules = array(
	    'email' => 'required|email|unique:users,email',
	    'password' => 'required|min:6|confirmed',
	    );

	  $validator = Validator::make(Input::all(), $rules);

	  if ($validator->fails())
	  {
	  	return Redirect::to('user/register')->withInput(Input::only('email'));
	  }
	  else
	  {
	  	$email = Input::get('email');
	  	$password = Input::get('password');

	  	$user = new User;
	  	$user->email = $email;
	  	$user->password = Hash::make($password);
	  	if ($user->save())
	  	{
		  	Log::debug('Registration successful.');
	        	return Redirect::to('user/login')->withInput(Input::only('email'));
	  	}
	  	else
	  	{
		  	Log::debug('Registration failure.');
	      		return Redirect::to('user/register')->withInput(Input::only('email'));
	  	}
	  }
	}

	public function getDashboard()
	{
    		return View::make('user.dashboard');
	}

	public function getProfile()
	{
		$user = Auth::user();
    		return View::make('user.profile')->with('user', $user);
	}

	

	public function getLogout()
	{
		Auth::logout();
		Session::flush();
		return Redirect::to('/');
	}

}
