@extends('layout.layout')

@section('content')
<div class="page-header">
	<h1>
		Users
		{{-- // FIX ME change markup --}}
		<small>
			<a href="{{ URL::route('users.create') }}">
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
  		<th>username</th>
  		<th>roles</th>
  		<th>updated_at</th>
  		<th>actions</th>
  	</tr>
  </thead>
  <tbody>
  @foreach($users as $user)
	  <tr>
	  	<td>#{{ $user->id }}</td>
	  	<td>{{{ $user->name }}}</td>
	  	<td>{{{ $user->username }}}</td>
	  	<td>{{{ implode(', ', $user->rolesArray()) }}}</td>
	  	<td>{{{ $user->updated_at }}}</td>
	  	<td>
	  		<form class="form-inline" method="POST" action="{{ URL::route('users.destroy', $user->id) }}">
	  			<input type="hidden" name="_method" value="DELETE" />
		  		<a href="{{ URL::route('users.edit', $user->id) }}" class="btn btn-default" role="button">
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