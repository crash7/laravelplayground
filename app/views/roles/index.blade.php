@extends('layout.layout')

@section('content')
<div class="page-header">
	<h1>
		Roles
		{{-- // FIXME change markup --}}
		<small>
			<a href="{{ URL::route('roles.create') }}">
			add new
			</a>
		</small>
	</h1>
</div>
<table class="table table-striped table-condensed">
  <thead>
  	<tr>
  		<th>id</th>
  		<th>name</th>
  		<th>actions</th>
  	</tr>
  </thead>
  <tbody>
	@foreach($roles as $role)
	  <tr>
	  	<td>#{{ $role->id }}</td>
	  	<td>{{{ $role->name }}}</td>
	  	<td>
	  		<form class="form-inline" method="POST" action="{{ URL::route('roles.destroy', $role->id) }}">
	  			<input type="hidden" name="_method" value="DELETE" />
	  			<a href="{{ URL::route('roles.edit', $role->id) }}" class="btn btn-default" role="button">
	  				<span class="glyphicon glyphicon-pencil"></span>
	  			</a>
	  			<button type="submit" class="btn btn-default">
	  				<span class="glyphicon glyphicon-trash"></span>
	  			</button>
	  		</a>
	  		</form>
	  	</td>
	  </tr>
  @endforeach
	</tbody>
</table>
@stop