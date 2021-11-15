@extends('layouts.main')

@section('content')
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
@if (session('logout'))
    <div class="alert alert-danger">
        {{ session('logout') }}
    </div>
@endif
<form method="POST" action="/auth/sign-in/processing">
	@csrf
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" required class="form-control">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" required class="form-control">
	</div>
	<button type="submit" class="btn btn-primary">Sign In</button>
</form>
@endsection