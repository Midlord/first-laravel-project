@extends('layout.default')

@section('content')

@if( count($errors) > 0)
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

<form action="/login" method="POST">
	{{ csrf_field() }}

	<label style="display: block;">Username</label>
	<input type="text" name="username">

	<label style="display: block;">Password</label>
	<input type="password" name="password">

	<button style="display: block; margin-top: 1rem;" type="submit">Log In</button>
</form>



@stop