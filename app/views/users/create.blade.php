@extends('layout.layout')

@section('content')
<div class="page-header">
	<h1>New user</h1>
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
<form method="POST" action="{{ URL::route('users.store') }}">
	<div class="form-group">
		<label for="input-name">Name</label>
		<input type="text" class="form-control" name="name" value="{{{ Input::old('name') }}}" />
	</div>
	<div class="form-group">
		<label for="input-name">Username</label>
		<input type="text" class="form-control" name="username" value="{{{ Input::old('username') }}}" />
	</div>
	<div class="form-group">
		<label for="input-name">Password</label>
		<input type="password" class="form-control" name="passphrase" />
	</div>
	<div class="form-group">
		<label for="input-name">Password confirmation</label>
		<input type="password" class="form-control" name="passphrase_confirmation" />
	</div>
	
	<div>
		<button type="submit" class="btn btn-primary">Create user</button>
	</div>
</form>
@stop