<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR?xhtmll/DTD/xhtmll-strict.dtd">

<!--
   | -Page for jobseekers to view their applications
   | -Only reachable from user's profile when the user is logged in
-->
<?php
	include_once("include/Config.php");
	include("include/Query.php");
	session_start();
?>

<html xmlns="http://ww.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
    		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          	<link href="https://fonts.googleapis.com/css?family=Work+Sans: 30%"  />
   		<title></title>
	</head>
	<body>
    		<h1>Current Applications </h1>
   		 <?php
 			$getApplications = "SELECT JobName, Applied_date, Description, B.CompanyID
           		FROM application as A, job as B, jobseeker as C
           		WHERE C.JobSeekerID = A.JobseekerID AND A.JobID = B.JobID
            		GROUP BY A.ApplicationID
            		ORDER BY Close_date";
	
			$result = query($getApplications,$db);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$count = mysqli_num_rows($result);

    			if ($count > 0) {
				echo "<table><tr><th>Job Title</th><th>Submission Date</th><th>Job Description</th><th>Company</th></tr>";
        			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["JobName"]."</td><td>".$row["Applied_date"]."</td><td>".$row["Description"]."</td><td> ".$row["B.CompanyID"]."</td></tr>";
        				}
        			echo "</table>";
   			} 
			else {
				echo "0 results";
    			}
			$db -> close();
  	  	?>

    <!--Need to Add Application Numbering ie 1 to 50 && add a remove/delete button to each row-->

</body>
</html>
