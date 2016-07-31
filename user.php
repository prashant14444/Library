<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0 auto;
  display: table;
  text-align: center;
  font-family: 'Open Sans', sans-serif;
  background: #81b5d6;
  max-width: 33em;
}
h3 {
  font-size: 22px;
  color: #FFF;
}
h3 span {
  font-weight: 300;
}
</style>
</head>
<?php
session_start();

if (isset($_POST['username'])&&isset($_POST['password']))
{
	$username=htmlentities($_POST['username']);
	$password=htmlentities($_POST['password']);
	
	if(!empty($password)&&!empty($username))
	{
	}
	else
	{
		echo "<h3>Fill All The Fields</h3>";
		require "login.html";
		die();
	}
	
}


//database part

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "library management";

// Create connection
$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users ORDER BY 'id'";

if ($query_run=mysqli_query($conn, $sql)) {
	$count=0;
	while($query_row=mysqli_fetch_assoc($query_run))
	{
		$username_db=$query_row['username'];
		$password_db=$query_row['password'];
		//echo $username_db.' '.$password_db.' <br>';
		
		if(($username_db==$username)&&($password==$password_db))
		{
			//print "<h3>successfully logged in</h3>";
			$count=1;
			$_SESSION['is logged in']=true;
			$_SESSION['uname']=$username;
			//now redirect from this page to user account page
			header('location:myaccount.php');
			break;
		}
	}
	if($count==0)
		{
			print "<h3>Wrong Username Or Password!</h3>";
			require "login.html";
		}
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>

</html>