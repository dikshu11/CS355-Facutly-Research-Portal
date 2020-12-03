 <html>
	<head>
	<link rel="stylesheet" href="phpcss2.css">
	<title>Publications</title>
</head>


<?php
$fid = $_GET['fid']; 	
$con = mysqli_connect("db","user","test","myDb");
// Check connection
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "select fname, count(a1.fid) as cnt from author as a1, author as a2, faculty
where a1.pubid = a2.pubid
and a1.fid != a2.fid
and a2.fid = '$fid'
and faculty.fid = a1.fid
group by a2.fid, a1.fid;
";

$result = $con->query($sql);

if($result)
{
	echo "<h1> Collaborations <br> </h1>";
	echo "<div class=\"table-wrapper\"><table class=\"fl-table\">";
	echo "<thead><tr><th>Name </th><th>Count</th></tr></thead>";
	echo "<tbody>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		printf("<td> %s </td> <td> %d </td>",$row['fname'], $row['cnt']);
		echo "</tr>";
	}
	echo "</tbody></table></div>";

	$result->free();
}

echo "<br><br><center><a href = http://localhost:8001/> Home </a></center>";	
$con->close();
?>
</html>