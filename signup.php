<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<link rel="stylesheet" type="text/css" href="/css/style2.css">
</head>
<body>
	<div id="signup">
		<h1>CREATE AN ACCOUNT</h1>
		<form>
			<!-- <label for="firstname"> First Name:</label> -->
			<input type="text" name="firstname"  id="fname" class="text" placeholder="First Name...">
			<!-- <label for="lastname">Last Name:</label> -->
			<input type="text" name="lastname" id="lname" class="text" placeholder="Last Name...">
			<!-- <label for="email">Email Address:</label> -->
			<input type="email" name="email" id="mail" class="text" placeholder="Email...">
			<fieldset>
				<legend>Account Type</legend>
				<ul>
					<li>
						<label for="teacher">Teacher</label>
						<input type="radio" name="acctype" id="teacher" value="teacher">
						<span></span>
					</li>
					<li>
						<label for="student">Student</label>
						<input type="radio" name="acctype" id="student" value="student">
						<span></span>
					</li>
				</ul>
			</fieldset>
			<input type="submit" name="create" value="Create">
		</form>
		<hr>
		<p>Already have an account?</p>
		<a href="index.html"> LOGIN</a>
	</div>
</body>
</html>