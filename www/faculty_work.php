<html>
	<head>
	<link rel="stylesheet" href="phpcss2.css">
</head>

<?php
$fid= $_GET['fid']; 	

 
$con = mysqli_connect("db","user","test","myDb");

// Check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sql = "SELECT pname, dop, pages, topic, Arank from faculty, publications, author where author.fid = '$fid' and author.pubid = publications.pubid and  faculty.fid = '$fid' order by publications.dop DESC";

$result = $con->query($sql);
if($result)
{
	echo "<h1> Publications: <br> </h1>";
	echo "<div class=\"table-wrapper\"><table class=\"fl-table\">";
	echo "<thead><tr><th>Name</th><th>Date of Publication</th><th>Pages</th><th>Topic</th><th>Author Rank</th></tr></thead>";
	echo "<tbody>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		printf("<td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td>",$row["pname"], $row['dop'],$row['pages'], $row['topic'], $row['Arank'] );
		echo "</tr>";
	}
	echo "</tbody></table></div>";

	$result->free();
}

$sql = "SELECT pname, dos, budget, sponsor, role from faculty, project, takes where takes.fid = '$fid' and takes.pid = project.pid and  faculty.fid = '$fid' ORDER BY project.dos DESC";
$result = $con->query($sql);

if($result)
{
	echo "<h1> Projects: <br> </h1>";
	echo "<div class=\"table-wrapper\"><table class=\"fl-table\">";
	echo "<thead><tr><th>Name</th><th>Date of Start</th><th>Budget</th><th>Sponsor</th><th>Role</th></tr></thead>";
	echo "<tbody>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		printf("<td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td>",$row["pname"], $row['dos'],$row['budget'], $row['sponsor'], $row['role'] );
		echo "</tr>";
	}
	echo "</tbody></table></div>";

	$result->free();
}


echo "<br><br><center><a href = http://localhost:8001/> Home </a></center>";	
$con->close();

?>


</html>