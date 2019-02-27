@extends('Inscription')

@section('content')
<div classe="row">
	<div class="col-md-12">
		<br />
		<h3 align="center">Add Data</h3>
		<br />
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all as $error)
					<li>{{$error}}</li>
				@endforach
			</ul>
		</div>
		@endif
		@if(\Session: :has('success'))
		<div class="alert alert-success">
			<p>{{ \Session::get('success') }}</p>
		</div>
		@endif
		<form method="post" action="{{url('user')}}">
			{{csrf_field()}}
			<input type="mail" id="login" name="login" placeholder="Steve230@orange.fr">
			<input type="password" id="password" name="password">
			<!--input type="checkbox" id="oui" name="subscribe" value="Oui">
			<input type="checkbox" id="non" name="subscribe" value="Non"-->
		</form>
	</div>
</div>
@endsection