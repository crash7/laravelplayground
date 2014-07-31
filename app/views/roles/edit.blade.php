@extends('layout.layout')

@section('content')
<div class="page-header">
	<h1>Edit role #{{ $role->id }}</h1>
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
<form method="POST" action="{{ URL::route('roles.update', $role->id) }}">
	<input type="hidden" name="_method" value="PUT" />
	<div class="form-group">
		<label for="input-name">Name</label>
		<input type="text" class="form-control" name="name" value="{{{ Input::old('name', $role->name) }}}" />
	</div>

	<div>
		<button type="submit" class="btn btn-primary">Save role</button>
	</div>
</form>
@stop