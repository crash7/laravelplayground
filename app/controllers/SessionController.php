<?php
class SessionController extends \BaseController {

	/**
	 * Login form view
	 */
	public function form() {
		return View::make('session.loginform');
	
	}

	/**
	 * Login form validation data
	 */
	public function auth() {
		$response = null;
		
		$validation = Validator::make(Input::only('username', 'passphrase'), array(
			'username' => 'required',
			'passphrase' => 'required' 
		));
		
		if($validation->passes()) {
			$credentials = array(
				'username' => Input::get('username'),
				'password' => Input::get('passphrase') 
			);
			
			if(Auth::attempt($credentials)) {
				$response = Redirect::intended('/');
			} else {
				$response = Redirect::route('session.loginform')->withErrors(array(
					Lang::get('messages.invalid_login') 
				));
			}
		} else {
			$response = Redirect::back()->withErrors($validation)->withInput(Input::except('passphrase'));
		}
		return $response;
	
	}

	/**
	 * Logout process
	 */
	public function logout() {
		Session::clear();
		Auth::logout();
		return Redirect::to('login');
	
	}


}

?>