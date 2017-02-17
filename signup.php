<?php
$a=$_POST['nm'];
$b=$_POST['sex'];
$c=$_POST['dob'];
$d=$_POST['em'];
$e=$_POST['pw'];
$f=$_POST['cpw'];
$g=$_POST['pn'];
if($a==""||$b==""||$c==""||$d==""||$e==""||$f==""||$g==""){
	echo "Fields are empty!";
}
else{
	if($e==$f){
	mysql_connect("localhost","root","");
	mysql_select_db("pro");
	$query="SELECT * FROM data WHERE name='$a'";
	$result=mysql_query($query);
	$count=mysql_num_rows($result);
	if($count==0){
		$query1="INSERT INTO data(name,sex,dob,email,password,phone_num) values('$a','$b','$c','$d','$e','$g')";
		mysql_query($query1);
		echo "<center><font size='40'>Signed Up Successfully!! Redirecting to login page....</font></center>";
		header("refresh:2; url=loginh.php");
	}
	else{
		echo "<body background='3.jpg'><center>";
		echo "<font size='10'>You have already registered.</font><br>";
		echo "<font size='5'><a href='reseth.php'>Forgotten account??</a></font>";
		echo "</center></body>";
	}
	}
	else{
		echo "<body background='3.jpg'><center>Passwords are not same.</center></body>"
	}
}
?>