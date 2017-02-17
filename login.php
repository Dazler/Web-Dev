<?php
session_start();
$a=$_POST['ui'];
$b=$_POST['pw'];
if($a==""||$b==""){
	echo "Fields are empty!";
}
else{
	mysql_connect("localhost","root","");
	mysql_select_db("pro");
	if($a=="admin"){
			if($b!='admin')echo "<body background='4.jpg'><center><font size='30'>Incorrect usename/password</font></center></body>";
			else{
				mysql_connect("localhost","root","");
				mysql_select_db("pro");
				$query="SELECT * FROM data";
				$result=mysql_query($query);
				echo "<body background='4.jpg'><center><font size='30'> Admin welcome!</font>";
				echo "<table border='2'>";
				echo "<th>name</th><th>sex</th><th>dob</th><th>email</th><th>password</th><th>phone_num</th><th>confirmed</th><th>user_id</th>";
				while($row=mysql_fetch_array($result)){
					echo "<tr>";
					echo "<td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "<td>".$row[5]."</td>";
					if($row[6]==0)
					echo "<td><form action='conf.php' method='POST'><input type='checkbox' name='tick'><input type='submit' value='Confirm'></form>".$row[6]."</td>";
					else echo "<td>".$row[6]."</td>";
					echo "<td>".$row[7]."</td>";
					echo "</tr>";
				}
				echo "<p><a href='logout.php'>Log Out</a></p>";
				echo "</center></body>";
			}
	}
	else{
	$query="SELECT * FROM data WHERE name='$a' AND password='$b'";
	$result=mysql_query($query);
	$count=mysql_num_rows($result);
	if($count==1){
		$_SESSION['name']=$a;
		header("location:welcome.php");
	}
	else{
		echo "<body background='4.jpg'><center><font size='30'>Incorrect usename/password</font></center></body>";
	}
	}
}
?>