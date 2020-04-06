<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR?xhtmll/DTD/xhtmll-strict.dtd">

<!--
   | -Page for new users looking to create a basic account
   | -Has some basic error checking (username taken, email address taken, password not matching password confirm)
   | -All new users need to go through this page
--> 

<?php
	session_start();
?>

<?php
	require_once "include/Config.php";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$errors=array();
		
		
		//Query checks if username is taken
		$getUsername = "SELECT ID 
						FROM userlogin 
						WHERE username ='".$_POST["username"]."'";
		$result = mysqli_query($db,$getUsername) or die('Error executing query: '.mysqli_error($db));
		$count = mysqli_num_rows($result);
		
		//Query checks if email address is taken
		$getEmail = "SELECT Email 
					 FROM userlogin 
					 WHERE Email='".$_POST["email"]."'";
		$resultb = mysqli_query($db,$getEmail) or die('Error executing query: '.mysqli_error($db));
		$countb = mysqli_num_rows($resultb);
		
		if($count != 0){
			$message="This username is already taken!";
			array_push($errors,$message);
		}
		if($countb != 0){
			$message="This email address is being used!";
			array_push($errors,$message);
		}
		if($_POST["psw"] != $_POST["psw-repeat"]){
			$message="Passwords do not match!";
			array_push($errors,$message);
		}
		
		if(empty($errors)){
			$sql = "INSERT INTO userlogin (Username,Password,FirstName,MiddleName,LastName,Email) VALUES ('".$_POST["username"]."','".$_POST["psw"]."','".$_POST["firstname"]."','".$_POST["middlename"]."','".$_POST["lastname"]."','".$_POST["email"]."')";
			$result = mysqli_query($db,$sql) or die('Error executing query: '.mysqli_error($db));
			
			echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
		}
		else{
			foreach($errors as $errorMsg){
				echo $errorMsg."<br/>";
			}
		}
	}
?>

<html xmlns="http://ww.w3.org/1999/xhtml" lang="en" xml:lang="en">
	  <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link href="https://fonts.googleapis.com/css?family=Work+Sans: 30%"  />
            <link type="text/css" rel="stylesheet" href="style.css"/>
            <title>Registration Page</title>
        </head>
	
	<form action="" method="POST">
		<div class="container">
			<h1>Register</h1>
			<p>Please fill in this form to create an account.</p>
			<hr>
				<br/>
				
				<label for="username"><b>Username</b></label>
				<input type="text" placeholder="Enter username" name="username" required="required" />
				
				<br/>

				<label for="firstname"><b>First Name</b></label>
				<input type="text" placeholder="Enter first name" name="firstname" required="required" />
				
				
				<label for="middlename"><b>Middle Name</b></label>
				<input type="text" placeholder="Enter middle name" name="middlename"/>
				
				<label for="lastname"><b>Last Name</b></label>
				<input type="text" placeholder="Enter last name" name="lastname" required="required" />
				
				<br/>
				
				<label for="email"><b>Email</b></label>
				<input type="text" placeholder="Enter Email" name="email" required="required" />
				
				<br/>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required="required" />

				<label for="psw-repeat"><b>Repeat Password</b></label>
				<input type="password" placeholder="Repeat Password" name="psw-repeat" required="required" />
			<hr/>

			<button type="submit" class="registerbtn">Register</button>
		</div>

		<div class="container signin">
			<p>Already have an account? <a href="Login.php">Sign in</a>.</p>
		</div>
	</form>
</html>
