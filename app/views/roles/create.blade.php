@extends('layout.layout')

@section('content')
<div class="page-header">
	<h1>New role</h1>
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
<form method="POST" action="{{ URL::route('roles.store') }}">
	<div class="form-group">
		<label for="input-name">Name</label>
		<input type="text" class="form-control" name="name" value="{{{ Input::old('name') }}}" />
	</div>
	
	<div>
		<button type="submit" class="btn btn-primary">Create role</button>
	</div>
</form>
@stop