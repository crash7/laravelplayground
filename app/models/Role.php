<?php
class Role extends \Eloquent {
	public $timestamps = false;
	protected $table = 'roles';
	protected $primaryKey = 'id';
	protected $fillable = array(
		'name' 
	);


}

?>