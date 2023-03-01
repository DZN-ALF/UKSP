@extends('layouts.app')
@section('content')
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST" action="{{ route('login') }}">
            @csrf
			<h1>Login</h1>
			<input type="email" value="{{ old('email') }}" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password"/>
			<button type="submit">Login</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form>
            @csrf
			<h1>Web App Spp</h1>
			<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id labore non ea nesciunt accusantium dolore est! Excepturi est praesentium, quasi dolor, perferendis vero similique laboriosam autem necessitatibus, natus harum eveniet.</p>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Penjelasan</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signIn">Penjelasan</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Login App Spp</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Login</button>
			</div>
		</div>
	</div>
</div>
  @endsection