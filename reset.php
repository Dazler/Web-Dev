<?php
$a=$_POST['nm'];
$b=$_POST['dob'];
$c=$_POST['pw'];
$d=$_POST['cpw'];
if($a==""||$b==""||$c==""||$d==""){
	echo "Fields are empty!";
}
else{
	if($c==$d){
		mysql_connect("localhost","root","");
		mysql_select_db("pro");
		$query="SELECT * FROM data WHERE name='$a' AND dob='$b'";
		$result=mysql_query($query);
		$count=mysql_num_rows($result);
		if($count==0){
			echo "Incorrect information.";
		}
		else{
			$query1="UPDATE data SET password='$c' WHERE name='$a'";
			mysql_query($query1);
			echo "<center><font size='40'>Password updated!! Redirecting to login page....</font></center>";
			header("refresh:2; url=loginh.php");
		}
	}
	else{
		echo "Passwords are different!";
	}
}
?>