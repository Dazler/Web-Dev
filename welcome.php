<?php
session_start();
if(isset($_SESSION['name'])){
	echo "<body background='4.jpg'><center>";
	echo "You have successfully logged in!<br>";
	echo $_SESSION['name']."<br><br><br>";
	mysql_connect("localhost","root","");
	mysql_select_db("pro");
	$a=$_SESSION['name'];
	$query="SELECT * FROM data WHERE name='$a'";
	$result=mysql_query($query);
	if($row=mysql_fetch_array($result)){
		if($row[6]==0) echo "You are not confirmed yet!<br><br>";
		else echo "You are confirmed , Enjoy!<br><br>";
	}
	echo "<p><a href='logout.php'>Log Out</a></p>";
}


?>