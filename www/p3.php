<html>
	<head>
	<link rel="stylesheet" href="phpcss2.css">
</head>

<?php

$dept = $_GET['dept']; 	

$con = mysqli_connect("db","user","test","myDb");

// Check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "select sum(budget) as tot from project where pid in(select distinct(project.pid) from takes, faculty, project
where faculty.dept = '$dept'
and faculty.fid = takes.fid 
and takes.pid = project.pid);;
";

$result = $con->query($sql);

if($result)
{
	while($row = $result->fetch_assoc())
	{
		echo "<h1>";
		printf("Total funds recieved by %s department is : %s",$dept, $row['tot']);
		echo "</h1>";
	}
	$result->free();
}

$sql = "SELECT DISTINCT  pname,dos, budget, sponsor from faculty, project, takes where faculty.dept = '$dept' and project.pid = takes.pid and faculty.fid = takes.fid";
$result = $con->query($sql);

if($result){
	echo "<h1> Project in $dept department <br> </h1>";
	echo "<div class=\"table-wrapper\"><table class=\"fl-table\">";
	echo "<thead><tr><th>Project Name</th><th>Date of Start</th><th>sponsor</th><th>budget</th></tr></thead>";
	echo "<tbody>";
	while($row = $result->fetch_assoc()){
		echo "<tr>";
		printf("<td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td> ",$row["pname"], $row['dos'] , $row['sponsor'] ,$row['budget'] );
		echo "</tr>";
	}
	echo "</tbody></table></div>";
	$result->free();
}


$sql = "SELECT DISTINCT pname,dop, pages, topic from faculty, publications, author where faculty.dept = '$dept' and publications.pubid = author.pubid and faculty.fid = author.fid";
$result = $con->query($sql);

if($result){
	echo "<h1> Publications in $dept department <br> </h1>";
	echo "<div class=\"table-wrapper\"><table class=\"fl-table\">";
	echo "<thead><tr><th>Publications Name</th><th>Date of publishing</th><th>pages</th><th>topic</th></tr></thead>";
	echo "<tbody>";
	while($row = $result->fetch_assoc()){
		echo "<tr>";
		printf("<td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td> ",$row["pname"], $row['dop'] , $row['pages'] ,$row['topic'] );
		echo "</tr>";
	}
	echo "</tbody></table></div>";
	$result->free();
}



echo "<br><br><center><h3><a href = http://localhost:8001/> Home </a></center></h3>";
	
$con->close();
?>
</html>