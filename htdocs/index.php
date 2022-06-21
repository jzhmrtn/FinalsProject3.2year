<?php
	include 'config.php';

	session_start();

	function isLoggedIn() {
		echo "<script>alert('Login first!')</script>";
	 }

	if (isset($_GET['checker'])) {
		isLoggedIn();
	}
	
	if(isset($_POST['loginButton'])){
		$userInp = $_POST['user'];
		$passInp = ($_POST['pass']);
		
		$sql = "SELECT * FROM account WHERE username = '$userInp' AND password ='$passInp'";
		$result = mysqli_query($conn, $sql);

		if($result-> num_rows > 0){
	
			$row = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $row['username'];
			header("Location: home.php");

		} else {
			echo "<script>alert('Wrong username or password!')</script>";
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styleLogin.css">
</head>
<body>
  
  <div class="container"> 
    <img src="images/shoeless.png" class="shoeLogo">
    <h2>SHOEMAN</h2>
    <h1>Inventory Management <br> System</h1>

    <div id="text">
		  <p>Easily manage your inventory with Shoeman's<br>
         open-source inventory system!</p>
    </div>

    <div class="login">
   	    <form method="post">
				<div class="inputs">
					<div class="inputField">
						<input name="user" type="text" required>
						<span></span>
						<label>username</label>
						<img class="user" src="images/user.png">
					</div>
					<div class="inputField">
						<input name="pass" type="password" required>
						<span></span>
						<label>password</label>
						<img class="pass" src="images/pass.png">
					</div>
					<div class="pass">
       				    <button name="loginButton" class="btn"> Login</button>
					</div>
	
				</div>
			</form>
    </div>

     

    <div class="navigation">
      <nav>
        <ul class="menu">
          <li> <a href="index.php?checker=true">About Us</li>
          <li> <a href="index.php?checker=true">Contact Us</li>
        </ul>
      </nav>
    </div>
    <br>
    <br>
    <br>
    <br>
      <img src="images/pic.png" width="500" height="333" align="right"> 

</div>


</body>
</html>