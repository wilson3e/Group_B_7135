<html>
<body>

<h1>Job Search RESULTS</h1>
_____________________________________________________
<br><br>
<form action= "JobSearchResults.php" method="post">
   
 Job ID	      <input type="text" name="JobID">
 Job Name     <input type="text" name="JobName" ></p>
 Job Type     <input type="text" name="JobType" >
 Job Category <input type="text" name="JobCategory" ></p>
 Salary       <input type="text" name="SalaryRange" >
 Posting Date <input type="text" name="PostDate" ></p>
 Close Date   <input type="text" name="CloseDate" >
 Job Location <input type="text" name="Location" ></p>
 CompanyID    <input type="text" name="CompanyID" >
 Description  <input type="text" name="Keyword" ></p>
 <br>
  <input type="submit" value="Find A Job">
</form>
_____________________________________________________
<div>
	<br>
    <input type="submit" value="Back">
	&nbsp &nbsp &nbsp
    <input type="submit" value="Reset">
</div>

<div>
results will appear here

<?php//These values are for search to be implemented next
	$_JobID= $_POST["JobID"];
	$_JobName= $_POST["JobName"];
	$_JobType= $_POST["JobType"];
	$_JobCategory= $_POST["JobCategory"];
	$_SalaryRange= $_POST["SalaryRange"];
	$_PostDate= $_POST["PostDate"];
	$_CloseDate= $_POST["CloseDate"];
	$_Location= $_POST["Location"];
	$_CompanyID= $_POST["CompanyID"];
	$_Keyword= $_POST["Keyword"];	
?>
<br>               
<?php echo $_JobID; ?>
<?php echo $_JobName; ?>
<?php echo $_JobType; ?>
<?php echo $_JobCategory; ?>
<?php echo $_SalaryRange; ?>
<?php echo $_PostDate; ?>
<?php echo $_CloseDate; ?>
<?php echo $_Location; ?>
<?php echo $_CompanyID; ?>
<?php echo $_Keyword; ?>
<?php
	$conn = mysqli_connect('localhost','root','','se_jobsearchapp');
	// Check connection
	if (mysqli_connect_errno()) 
	{
    	printf("Connect failed: %s\n", mysqli_connect_error());
    	exit();
	} 
	if ($result = mysqli_query($conn, "SELECT JobID, JobName, Description, CompanyID, Location FROM job")) 
	{

    	/* determine number of rows result set */
    	$row_cnt = mysqli_num_rows($result);

    	printf(" We found %d Jobs.\n", $row_cnt); 	
		?>	
	   <br>
	   APPLY BUTTON----Job ID----Job Name-------Description-------CompanyID-------Location
	   <br>
<?php
		// Row shit
		while ($row = $result->fetch_assoc())
		{ ?>
			<td> <input type="submit" value="APPLY">
			<td><?php echo $row["JobID"]; ?></td>
			<td><?php echo $row["JobName"]; ?></td>
			<td><?php echo $row["Description"]; ?></td>
			<td><?php echo $row["CompanyID"]; ?></td>
			<td><?php echo $row["Location"]; ?></td>
			<br>
			</tr>
<?php	} ?>

<?php
		//		
    	/* close result set */
    	mysqli_free_result($result);
 }
	/* close connection */
	mysqli_close($conn);
?>
