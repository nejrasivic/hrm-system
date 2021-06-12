<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>HRM system - Kreiranje korisnika</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="header" style=" width: 30%;background-color:black;">
		<h2 style="background-color:black;">Admin - kreirajte korisnika</h2>
	</div>
	
	<form method="post" action="create_user.php" style="width: 30%;">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Korisničko ime</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Tip usera</label>
			<select name="user_type" id="user_type" style="background: rgb(247, 105, 105);">
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Šifra</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Potvrdite šifru</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn" style="color:white;"> + Create user</button>
		</div>
	</form>
</body>
</html>