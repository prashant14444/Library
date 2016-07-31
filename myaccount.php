
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css" >
</head>
<body>
<?php
session_start();
/*echo "<pre>";
echo print_r($_SESSION);
echo "</pre>";*/
if(isset($_SESSION['uname']))
{
	echo "welcome ".$_SESSION['uname'];
}
else
{
	print "<h3>You Are Not Authorised To Access This Page!<br><br>Please Login Before Access!</h3>";
	require "login.html";
	die();
}
?>
<br><br><br>
<form action="logout.php">
	<input type='submit' value='Log out'>
</form>
</body>
</html>