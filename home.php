

<style>
    #grid {  
    margin: 50px 0 0 0px;
    width: 100%;
    text-align: center;
	zoom: 1;
	

   
}
.grid {
    border: 2px solid black;
    margin-left: 16px;
    width: 760px;
    vertical-align: top;
    display: inline-block;
    /*if you need ie6/7 support*/
    *display: inline;
	zoom: 1;
	border-radius: 20px;
	background-color:rgb(179, 179, 179);
}
.grid:first-child {
    margin-left: 0
}
.grid img {
    display: block
}

img {
  border-radius: 50%;
}

input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border-radius:20px;
}
    </style>


<?php 
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="styleHOME.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<style>
	.header {
		background: #000000;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>
</head>
<body>


	<input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header><?php echo ucfirst($_SESSION['user']['username']); ?></header>
      <a href="create_user.php">
        <i class="fas fa-user"></i>
        <span>Dodaj usera</span>
      </a>
      <a href="#" onclick="prikaziDev()">
        <i class="fas fa-user"></i>
        <span>Korisnici</span>
      </a>
      <a href="#" onclick="tab1()">
         <i class="fas fa-calendar"></i>
        <span>Nezavršeni</span>
      </a>
      <a href="#" onclick="tab2()">
         <i class="fas fa-calendar"></i>
        <span>Završeni</span>
      </a>
      <a href="home.php?logout='1'">
         <i class="fas fa-sign-out"></i>
        <span>Odjava</span>
      </a>

    </div>

    <script>
    // Dio koji pomaze da pokazemo registraciju
    function tab1(){
        document.getElementById('tabela1').style.visibility = 'visible';

    }
    function tab2(){
        document.getElementById('tabela2').style.visibility = 'visible';

    }
    function prikaziDev(){
        document.getElementById('grid').style.visibility = 'visible';

    }
    </script>



	<div class="header" style=" width: 718px;" >
		<h2>Admin page/dashboard</h2>
	</div>
	<div class="content" style=" width: 718px;">
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

	</div>


	

	<center>
	<br>	
	<aside class="grid">
    <h1>Zadaci</h1>
	<center>
	<div class="tasks">
	<form method="post" action="home.php" style="width:90%;" >
		<input type="text" name="task" class="task_input" placeholder="Unesite zadatak" required=""><br>
		<input type="text" name="username" placeholder="Unesite korisničko ime" required=""><br>
		<!-- 
		<select name = "username">;
				<option>---Odaberite usera--</option>;
				<?php
				$res = mysqli_query($db, "SELECT username FROM users WHERE user_type='user'");
				if ($res) {
    			while($row = $res->fetch_assoc()) {
	   			echo '<option value="' . $row['id'] . '">' . $row['username'] . '</option>';
    			}
			}?>
		</select>
		-->
		<button type="submit" name="submit" id="add_btn" class="btn">Dodaj</button><br>
	</form>
	<style>
.btn {
  background-color: #ddd;
  border: none;
  color: black;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  transition: 0.3s;
}

.btn:hover {
  background-color: rgb(247, 105, 105);
  color: white;
}
</style>
	</center>
	<section id="grid" style="visibility: hidden;">
    	<center>
		<h1>Uposlenici kompanije:</h1>
		<br>
		<table style="width: 93%">
		<thead>
			<tr>
				<th>Uposlenici kompanije</th>
				<th>Email</th>
				<th>Brisanje</th>
				
			</tr>
		</thead>
		<tbody>
			
		
        <?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "multi_login";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Konekcija neuspješna: " . $conn->connect_error);
		}

		$sql = "SELECT username, email, id FROM users WHERE user_type='user'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				?>
				<tr>
				<td><?php echo$row["username"];?></td>
				<td><?php echo$row["email"];?></td>
				<td><a href="home.php?del_task2=<?php echo $row['id'] ?>"><i class="fas fa-trash"></i></a></td>
				</tr>
				<?php

			}
		} else {
			echo "Nema rezultata";
		}
		$conn->close();
		?>
		
		</tbody>
        </table>   
        </center> 
</section>

		<center>
	<div id = "tabela1" class="table" style="visibility: hidden">
	<br>
		<h3>Nezavršeni zadaci</h3>
		<br>
		<table style="color: black;">
		<thead>
			<tr>
				<th>Br.</th>
				<th>Zadatak</th>
				<th>Korisnik</th>
				<th style="width: 60px;">Brisanje</th>
				
			</tr>
		</thead>

		<tbody>
			<?php 
			// select all tasks if page is visited or refreshed
			$tasks = mysqli_query($db, "SELECT * FROM tasks WHERE zavrsen = 0");


			$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
				
				<tr>
					<td> <?php echo $i; ?> </td>
					<td class="task"> <?php echo $row['task']; ?> </td>
					<td class="user"><?php echo ucfirst($row['username']);?></td>
					<td class="delete"> 
						<a href="home.php?del_task=<?php echo $row['id'] ?>"><i class="fas fa-trash"></i></a> 
					</td>
					
				</tr>

			<?php $i++; } ?>	
		</tbody>
		</table>
		</div>
	</center>

	<center>
	<div id = "tabela2" class="table2" style="visibility: hidden">
	<br><br>
		<h3>Završeni zadaci</h3>
		<br>
		<table>
		<thead>
			<tr>
				<th>Br.</th>
				<th>Zadatak</th>
				<th>Korisnik</th>
				<th style="width: 60px;">Brisanje</th>
				
			</tr>
		</thead>

		<tbody>
			<?php 
			// select all tasks if page is visited or refreshed
			$tasks = mysqli_query($db, "SELECT * FROM tasks WHERE zavrsen = 1");


			$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
				
				<tr>
					<td> <?php echo $i; ?> </td>
					<td class="task"> <?php echo $row['task']; ?> </td>
					<td class="user"><?php echo $row['username'];?></td>
					<td class="delete"> 
						<a href="home.php?del_task=<?php echo $row['id'] ?>"><i class="fas fa-trash"></i></a> 
					</td>
					
				</tr>

			<?php $i++; }?>	
		</tbody>
		</table>
		</div>
	</center>

	</aside>
		</center>
	
	
	<?php 

    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "multi_login");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "Unesite zadatak";
		}else{
			$task = $_POST['task'];
			$user = $_POST['username'];
			$izvrsen = 0;
			$sql = "INSERT INTO tasks (task, username, zavrsen) VALUES ('".$task."', '".$user."', '".$izvrsen."')";
			mysqli_query($db, $sql);
			header('location: home.php');
		}
	}
	
	if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];
	
		mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
		header("Refresh:0");
	}	
	

		if (isset($_GET['del_task2'])) {
		$id2 = $_GET['del_task2'];
	
		mysqli_query($db, "DELETE FROM users WHERE id=".$id2);
		header("Refresh:0");
		
	}	
	?>
	</div>
</body>
</html>