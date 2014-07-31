@extends('layout.layout')

@section('content')
<div class="page-header">
	<h1>Edit user #{{ $user->id }}</h1>
</div>

@if(count($errors) > 0)
<div class="alert alert-danger" role="alert">
	<ul class="form-errors">
	@foreach($errors->all() as $fielderror)
		<li>{{ $fielderror }}</li> 
	@endforeach
	</ul>
</div>
@endif

{{-- FIXME add cross forgery check --}}
{{-- FIXME fix label's for and input id's --}}
<form method="POST" action="{{ URL::route('users.update', $user->id) }}">
	<input type="hidden" name="_method" value="PUT" />
	<div class="form-group">
		<label for="input-name">Name</label>
		<input type="text" class="form-control" name="name" value="{{{ Input::old('name', $user->name) }}}" />
	</div>
	<div class="form-group">
		<label for="input-username">Username</label>
		<input type="text" class="form-control" name="username" value="{{{ Input::old('username', $user->username) }}}" />
	</div>
	<div class="form-group">
		<label for="input-passphrase">Password</label>
		<input type="password" class="form-control" name="passphrase" />
	</div>
	<div class="form-group">
		<label for="input-passphrase-confirmation">Password confirmation</label>
		<input type="password" class="form-control" name="passphrase_confirmation" />
	</div>
	
	<h3>Roles</h3>
	@foreach($roles as $role)
	<div class="checkbox">
		<label>
			<input type="checkbox" name="roles[{{ $role->id }}]" {{ $user->roles->contains($role->id) ? ' checked ' : '' }} />
			{{{ $role->name }}}
		</label>
	</div>
	@endforeach
	
<!-- 	<input type="text" name="role[1]" />	 -->
	
	<div>
		<button type="submit" class="btn btn-primary">Save user</button>
	</div>
</form>
@stop