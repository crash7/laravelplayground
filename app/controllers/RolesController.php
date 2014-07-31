<?php
class RolesController extends \BaseController {

	public function __construct(Role $user) {
		$this->role = $user;
	
	}

	public function index() {
		$roles = $this->role->orderBy('id')->get();
		
		return View::make('roles.index', array(
			'roles' => $roles 
		));
	
	}

	public function create() {
		return View::make('roles.create');
	
	}

	public function store() {
		$response = null;
		$validation = Validator::make(Input::all(), array(
			'name' => 'required|unique:roles,name' 
		));
		
		if($validation->passes()) {
			$newrole = $this->role->create(Input::only('name'));
			
			// FIXME add a nice message
			$response = Redirect::route('roles.index');
		} else {
			$response = Redirect::back()->withInput()->withErrors($validation);
		}
		return $response;
	
	}

	public function show($id) {
		$role = $this->role->find($id);
		
		return View::make('roles.show', array(
			'role' => $role 
		));
	
	}

	public function edit($id) {
		$role = $this->role->find($id);
		
		return View::make('roles.edit', array(
			'role' => $role 
		));
	
	}

	public function update($id) {
		$response = null;
		$validation = Validator::make(Input::all(), array(
			'name' => 'required|unique:roles,name,' . intval($id, 10) 
		));
		
		if($validation->passes()) {
			$role = $this->role->findOrFail($id);
			$role->name = Input::get('name', $role->name);
			$role->save();
			
			// FIXME add a nice message
			$response = Redirect::route('roles.index');
		} else {
			$response = Redirect::back()->withInput()->withErrors($validation);
		}
		return $response;
	
	}

	public function destroy($id) {
		// FIXME add a nice message
		$user = $this->role->findOrFail($id);
		$user->delete();
		return Redirect::route('roles.index');
	
	}


}

?>