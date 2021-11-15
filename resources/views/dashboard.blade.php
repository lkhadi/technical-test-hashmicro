@extends('layouts.main')

@section('content')
<form method="POST" action="/dashboard/checking-input">
	@csrf
	<div class="form-group">
		<label>First Input</label>
		<input type="text" name="first" required class="form-control">
	</div>
	<div class="form-group">
		<label>Second Input</label>
		<input type="text" name="second" required class="form-control">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@endsection