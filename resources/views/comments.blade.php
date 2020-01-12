<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../resources/views/comments.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<!-- <script type="text/javascript" src="../resources/views/index.js"></script> -->
</head>
<body>
	<header>
		<!-- <div class="row"> -->
			<!-- <a href="./index.blade.php">Index</a> -->
			<input type="button" value="Back" class="btn head left" onclick="editRow(this)">
			<!-- <input type="button" value="Back" class="test" onclick="editRow(this)"> -->
			<span id="span_name" class="span_hello">Hello, XXX</span>
			<!-- <span class="test2">Hello, XXX</span> -->
			<input type="button" value="Logout" class="btn head left" onclick="logout()">
			<!-- <input type="button" value="Logout" class="test" onclick="logout()"> -->
			<input type="button" value="Add Comment" class="btn head right" id="add_dialog">
			<!-- </div> -->
		</header>

		<div class="hero">
			<div class="form-box">
				<table id="table_id">
					<thead>
						<tr>
							<th>Comment ID</th>
							<th>Account</th>
							<th>Title</th>
							<th>Content</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody id="tbody_id">
					</tbody>
				</table>
			</div>
		</div>
		<div id="myModal" class="modal">

			<!-- Modal content -->
			<div class="modal-content">
				<span class="close">&times;</span>
				<input type="hidden" class="input-field" id="account" name="account" value="">
				<input type="text" class="input-field" placeholder="Title" name="title" required>
				<input type="text" class="input-field" placeholder="Content" name="content" required>
				<input type="button" value="Add" class="" id="addComment" onclick="addComment()">

			</div>

		</div>
		<script type="text/javascript" src="../resources/views/cookie.js"></script>
		<script type="text/javascript" src="../resources/views/comments.js"></script>
	</body>
	</html>
