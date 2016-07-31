
<html>
<head>
<style></style>
<title>Search Result</title>
</head>

<body>


<div class="Search">	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type='text' id="stb" name='search' placeholder='Search the book'> 
		<span class="error"> <?php echo $nameErr;?></span>
		 <input type='submit' value='Search'>
		 </form>
	</div>
</body>
</html>
<?php

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "library management";

$search=htmlentities($_POST['search']);
$search=strtolower($search);
//echo $search;

// Create connection
$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);
// Check connection
if (!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	
$sql="select * from books where bookname like '%".$search."%' or authorname like '%".$search."%'" ;
//$sql="select * from books where bookname='".$search."' or authorname='".$search."'" ;
//$sql = "SELECT * FROM books WHERE 'bookname'='$search'";

if ($query_run=mysqli_query($conn, $sql))
{ 
	$count=0;
	while($query_row=mysqli_fetch_assoc($query_run))
	{
		$bookname_db=($query_row['bookname']);
		$authorname_db=($query_row['authorname']);
		$copies_db=$query_row['copies'];
		{
			//echo $bookname_db.'<br>';
			//echo $authorname_db;
			$count=1;
			echo $bookname_db.' author is '.$authorname_db. ' only '.$copies_db.' copies are available.'.' <br>';
		}
	}
	if($count==0)
	{
		print "No Book Found!";
	}
}
else 
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

mysqli_close($conn);
?>
<div class="wrap">
		<form action="library.php" method='POST' id="theForm">
			<input type='submit' value='Click Here To Login'>
	</div>
	  </form>

