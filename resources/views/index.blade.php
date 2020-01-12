<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../resources/views/index.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<!-- <script type="text/javascript" src="../resources/views/index.js"></script> -->

</head>
<body>
	<div class="hero">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button id="login_btn" type="button" class="toggle-btn" onclick="slide_login(this.id)" disabled>Login</button>
				<button id="register_btn" type="button" class="toggle-btn" onclick="slide_register(this.id)">Register</button>
			</div>
			<form id="login_form" class="input-group tabin" method="POST">
				<input type="text" class="input-field" placeholder="Account" name="account" required>
				<input type="password" class="input-field" placeholder="Password" name="password" autocomplete="off" required>
				<!-- <button type="submit" class="submit-btn" onclick="submit_fun()">Login</button> -->
				<input type="button" id="login" value="login" class="submit-btn" onclick="submit_fun(this.form.id, this.value)">
			</form>
			<form id="register_form" class="input-group">
				<input type="text" class="input-field" placeholder="Name" name="name" required>
				<input type="text" class="input-field" placeholder="Account" name="account" required>
				<input type="password" class="input-field" placeholder="Password" name="password" autocomplete="off" required>
				<!-- <button type="submit" class="submit-btn" onclick="submit_fun()">Register</button> -->
				<input type="button" id="register" value="register" class="submit-btn" onclick="submit_fun(this.form.id, this.value)"><br>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="../resources/views/login.js"></script>
	<script type="text/javascript" src="../resources/views/cookie.js"></script>
</body>
</html>
