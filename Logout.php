<!--
   | -Logout page
-->
<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to main page
header("location: Index.php");
exit;
?>