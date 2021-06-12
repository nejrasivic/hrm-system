<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Prijava</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header" style="width: 40%; margin-top:7%">
	<h2>Registracija</h2>
</div>
<form method="post" action="register.php" style="width: 40%">
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
		<label>Šifra</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Potvrdite šifru</label>
		<input type="password" name="password_2">
	</div>
	<center>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Registracija</button>
	</div>
	<p>
		Imate račun? <a href="login.php">Prijavite se</a>
	</p>
	</center>
</form>
</body>
</html>