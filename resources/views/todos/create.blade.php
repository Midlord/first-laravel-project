@extends('layout.default')
@section('content')

@if( count($errors) > 0)
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif


<form action="{{ empty($todo) ? '/todos' : '/todos/'.$todo->id }}" method="POST">
	{{ method_field( empty($todo) ? 'POST' : 'PUT' ) }} {{ csrf_field() }}

	<label>Name</label>
	<input type="text" name="name" value="{{ empty($todo) ? '' : $todo->name }}">
	<button type="submit">{{ empty($todo) ? 'Create' : 'Update' }} todo</button>
</form>

@stop