<html>
	<head>
	<link rel="stylesheet" href="phpcss2.css">
</head>

<?php
$dept= $_GET['dept']; 	
$con = mysqli_connect("db","user","test","myDb");

if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();  // Check connection
}


$sql = "SELECT * from faculty where dept = '$dept' ";
$result = $con->query($sql);
if($result){
	echo "<h1> Faculty in $dept department <br> </h1>";
	echo "<div class=\"table-wrapper\"><table class=\"fl-table\">";
	echo "<thead><tr><th>Name</th><th>Date of Joining</th><th>Designation</th></tr></thead>";
	echo "<tbody>";
	while($row = $result->fetch_assoc()){
		echo "<tr>";
		printf("<td> %s </td> <td> %s </td> <td> %s </td>",$row["fname"], $row['doj'],$row['designation'] );
		echo "</tr>";
	}
	echo "</tbody></table></div>";
	$result->free();
}

$sql = "SELECT * from faculty where dept = '$dept' and designation = \"Hod\" ";
$result = $con->query($sql);

if($result){
	echo "<h3> Head of $dept department <br> </h3>";
	while($row = $result->fetch_assoc()){
		printf(" %s ",$row["fname"] );	
	}
	$result->free();
}

echo "<br><br><center><h3><a href = http://localhost:8001/> Home </a></h3></center>";
$con->close();
?>


</html>