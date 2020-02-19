<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="/css/login.css">
</head>
<body>
	<div class="background">
		<div class="box-column">
			<div class="box-auth">
				<form action="{{ route('auth.postLogin') }}" method="post">
					@method('post')
					@csrf()

					@if(session()->has('error'))
					<div class="alert alert-danger">
						{{ session('error') }} <span class="close">x</span>
					</div>
					@endif
					
					<div class="form-group">
						<h1>Login Page</h1>
					</div>
					<div class="form-group">
						<input type="text" name="username" class="form-control" autocomplete="off"></input>
						<label for="username">Username</label>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" autocomplete="off"></input>
						<label for="password">Password</label>
					</div>
					<div class="form-group">
						<button> login </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="/js/login.js"></script>
</body>
</html>