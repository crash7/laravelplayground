@extends('layout.layout')

@section('content')
<div class="page-header">
	<h1>Login</h1>
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

{{-- // FIXME add cross forgery check --}}
<form method="POST" action="{{ URL::route('session.auth') }}">
	<div class="form-group">
		<label for="input-username">Username</label>
		<input id="input-username" type="text" class="form-control" name="username" autocomplete="off" />
	</div>
	<div class="form-group">
		<label for="input-passphrase">Password</label>
		<input id="input-passphrase" type="password" class="form-control" name="passphrase" />
	</div>

	<div>
		<button type="submit" class="btn btn-primary">Sign in</button>
	</div>
</form>
@stop