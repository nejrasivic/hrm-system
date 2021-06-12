<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>HRM system - login/register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="section">

<div class="header" style="	width: 30% ; margin-top:7% ">
		<h2>Dobro došli - Login</h2>
	</div>
	<form method="post" action="login.php" style="	width: 30%;">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Korisničko ime</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Šifra</label>
			<input type="password" name="password">
		</div>
		<center>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Nemate korisnički račun? <a href="register.php" style="color:rgb(247, 105, 105);">Registrujte se</a>
		</p>
		</center>
	</form>

</div>
  <style>
</style> 
</body>
</html>