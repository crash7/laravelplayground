<?php
class UsersController extends \BaseController {

	public function __construct(User $user, Role $role) {
		$this->user = $user;
		$this->role = $role;
	
	}

	public function index() {
		$users = $this->user->orderBy('id')->get();
		
		return View::make('users.index', array(
			'users' => $users 
		));
	
	}

	public function create() {
		return View::make('users.create');
	
	}

	public function store() {
		$response = null;
		$validation = Validator::make(Input::all(), array(
			'name' => 'required',
			'username' => 'required|alpha_dash|unique:users,username',
			'passphrase' => 'required|confirmed' 
		));
		
		if($validation->passes()) {
			$newuser = $this->user->create(Input::only('name', 'username'));
			$newuser->password = Hash::make(Input::get('passphrase'));
			$newuser->save();
			$response = Redirect::route('users.edit', $newuser->id);
		} else {
			$response = Redirect::back()->withInput(Input::except('passphrase', 'passphrase_confirmation'))->withErrors($validation);
		}
		return $response;
	
	}

	public function show($id) {
		$user = $this->user->find($id);
		
		return View::make('users.show', array(
			'user' => $user 
		));
	
	}

	public function edit($id) {
		$user = $this->user->with('roles')->find($id);
		$roles = $this->role->all();
		
		return View::make('users.edit', array(
			'user' => $user,
			'roles' => $roles,
		));
	
	}

	public function update($id) {
		$response = null;
		$validation = Validator::make(Input::all(), array(
			'name' => 'required',
			'username' => 'required|alpha_dash|unique:users,username,' . intval($id, 10),
			'passphrase' => 'confirmed',
			'roles' => 'array'
		));
		
		if($validation->passes()) {
			$user = $this->user->findOrFail($id);
			$user->name = Input::get('name', $user->name);
			$user->username = Input::get('username', $user->username);
			if(Input::has('passphrase')) {
				$user->password = Hash::make(Input::get('passphrase'));
			}
			// FIXME add validation - check id roles			
			$user->roles()->sync(array_keys(Input::get('roles', array())));
			$user->save();
			
			$response = Redirect::route('users.edit', $user->id);
		} else {
			$response = Redirect::back()->withInput(Input::except('passphrase', 'passphrase_confirmation'))->withErrors($validation);
		}
		return $response;
	
	}

	public function destroy($id) {
		// FIXME add a nice message
		$user = $this->user->findOrFail($id);
		$user->delete();
		return Redirect::route('users.index');
	
	}


}

?>