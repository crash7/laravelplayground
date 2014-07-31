<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
class User extends Eloquent implements UserInterface, RemindableInterface {
	
	use UserTrait, RemindableTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $fillable = array(
		'name',
		'username' 
	);
	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array(
		'password',
		'remember_token' 
	);

	public function roles() {
		return $this->belongsToMany('Role', 'users_have_roles', 'users_id', 'roles_id');
	
	}
	
	// FIXME implement a better way to do this
	public function rolesArray() {
		return array_map(function ($element) {
			return $element['name'];
		}, $this->roles->toArray());
	
	}

	// FIXME implement a better role check
	public function hasAnyRole(array $roles) {
		foreach($this->roles as $role) {
			if(in_array($role->name, $roles)) {
				return true;
			}
		}
		return false;
	
	}


}

?>