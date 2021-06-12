<?php 
    include('functions.php');
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
?>

<?php
	if(@$_GET['Valid']==true){
?>
<?php $alert = $_GET['Valid'];
echo "<script type='text/javascript'> alert(".json_encode($alert).") </script>";?>
<?php
	}
?>

<?php

	require "conn.php";
	// Provjera konekcije
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
		}
		
	$user = $_SESSION['user']['username'];
	$sql = "SELECT task FROM tasks WHERE username LIKE '$user' AND zavrsen = 0";
	$sql2 = "SELECT zavrsen FROM tasks WHERE username LIKE '$user'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // Output podataka iz MySql tabele
	    $niz = [];
	    while($row = $result->fetch_assoc()) {
	        $var = $row["task"]; //varijabla koja ce nam povuci lokaciju 
	        array_push($niz, $var);
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div>
	<div class="header" style=" width: 718px; margin-top:5%">
		<h2>Home Page</h2>
	</div>
	<div class="content" style="    width: 718px;">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="login2.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" class="btn12" >logout</a>
					</small>
					<style>
			.btn12{
			
  border-color: #e7e7e7;
  color: black;
}

.btn12:hover {
  background: #e7e7e7;


				</style>
			
				<?php endif ?>
			</div>
		</div>
	</div>
	<center><br>	
		
		<?php 
			//echo $username;
		 ?>
		<section>
			<div class="naziv">
				<!-- Naziv projekta -->
			</div>
		</section>

		<section>

			<div class = "listaZadataka" style=" width: 760px; background-color:rgb(179, 179, 179);">
				<h3 style="color:white;">Vaši zadaci:</h3>
				<br>
				<table>
				<thead>
				<tr>
					<th>Br.</th>
					<th>Zadatak</th>
				</tr>
				</thead>

				<tbody>
					<?php 

					?>
					<form method = 'POST' >
					<?php
					$user = $_SESSION['user']['username'];
					$tasks = mysqli_query($db, "SELECT task FROM tasks WHERE username = '$user' AND zavrsen = 0"); 
					$i = 1; 
					while ($row = mysqli_fetch_array($tasks)) { 
					?><tr><?php
					$zad = $row['task'];
					if(!empty($niz)) {
					?>
						
						<td> <?php echo $i; ?> </td>
						<td> <?php echo $row['task'] . "<input style = 'float:right' type='checkbox' name='zadatak[]' value = '$zad'"?> </td>

						<?php
						$i++;?></tr><?php
					}
					
					if(empty($niz)){?>
						<td><?php $i ?></td>
						<td><?php echo "Nemate postavljenih zadataka" . "<br>";?></td>

					<?php  
					}
				}
					
					?>
					
			
				</tbody>
			</table>
			<br>
			
			<input type='submit' name='submit' id="btn11" value="Pošalji">
				

				<style>
				#btn11 {
				  border: none;
				  color: white;
				  padding: 16px 32px;
				  text-align: center;
				  font-size: 16px;
				  margin: 4px 2px;
				  opacity: 0.6;
				  transition: 0.3s;
				  border-radius:15px;
				  background-color: rgb(247, 105, 105);
				}
				
				#btn11:hover {opacity: 1}
				</style>

				
				<?php 
					if(isset($_POST['submit'])){
						if(!empty($_POST['zadatak'])){
							echo "<br>" . "Odabrani zadaci su poslani: ";
							$zavrsen = 1;
							foreach ($_POST['zadatak'] as $zadatak) {

								echo '<br>' . $zadatak;
								$link = mysqli_connect("localhost", "root", "", "multi_login");
								if($link === false){
								    die("ERROR: Could not connect. " . mysqli_connect_error());
								}
								$sql = "UPDATE tasks SET zavrsen = '$zavrsen' WHERE task ='$zadatak'";
								if(mysqli_query($link, $sql)){
									header('location:index.php?Valid=Poslali ste obavijest o završenom zadatku!');
								} else{
								    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
								}
								mysqli_close($link);
							}
						}
						
						else{
							echo "<br>"."Nije odabran nijedan zadatak!";
						}
					}

				
				?>
				</form>
				<!-- Pokupiti listu zadataka za logovanog usera iz baze 
				Pored svakog zadatka dodati checkbox
				Postaviti u tabelu -->

				<!-- PODACI IZ BAZE -->

			
				 

			</div>
		</section>
	</center>

</body>

</html>
