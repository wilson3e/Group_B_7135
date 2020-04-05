<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR?xhtmll/DTD/xhtmll-strict.dtd">

<!--
   | -Login page
   | -Has some basic error handling
   | -All new users need to go through this page
--> 
<?php
	session_start();
?>

<?php
	include_once("include/Config.php");
   
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	  
		// username and password sent from form 
		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']);
		
		// query to validate username and password inputs
		$sql = 'SELECT ID FROM userlogin WHERE username = "'.$myusername.'" AND password = "'.$mypassword.'"';
		$result = mysqli_query($db,$sql) or die('Error executing query: '.mysqli_error($db));
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
		$count = mysqli_num_rows($result);
		
		// checks if there's a match and sets session variables
		if($count == 1) {
			$_SESSION['id'] = $row["ID"];
			$_SESSION['username'] = $myusername;
			$_SESSION['loggedin'] = True;
			header("location: Index.php");
		}
		else {
			echo "Your Username or Password is invalid";
		}
	}
?>
  <html xmlns="http://ww.w3.org/1999/xhtml" lang="en" xml:lang="en">
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
