<html>
	<head>
	<link rel="stylesheet" href="phpcss2.css">
	
</head>

<?php
$word= $_GET['word']; 	


$con = mysqli_connect("db","user","test","myDb");
// Check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sql = "SELECT Distinct pname, dop, pages, topic from  publications where publications.pname LIKE \"%$word%\"  or publications.topic LIKE \"%$word%\"   order by publications.dop DESC";

$result = $con->query($sql);
if($result)
{
	echo "<h1> Publications on $word: <br> </h1>";
	echo "<div class=\"table-wrapper\"><table class=\"fl-table\">";
	echo "<thead><tr><th>Name</th><th>Date of Publication</th><th>Pages</th><th>Topic</th></tr></thead>";
	echo "<tbody>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		printf("<td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td> ",$row["pname"], $row['dop'],$row['pages'], $row['topic']);
		echo "</tr>";
	}
	echo "</tbody></table></div>";

	$result->free();
}


$sql = "SELECT faculty.fname, faculty.fid, pname, dop, pages, topic, Arank from faculty, publications, author where author.fid = faculty.fid and author.pubid = publications.pubid and ( publications.pname LIKE \"%$word%\"  or publications.topic LIKE \"%$word%\" ) order by publications.dop DESC, author.Arank ";

$result = $con->query($sql);
if($result)
{
	echo "<h3> faculty publications on $word : <br> </h3>";
	echo "<div class=\"table-wrapper\"><table class=\"fl-table\">";
	echo "<thead><tr><th>Name of faculty</th><th>faculty id</th><th>Name of publication</th><th>Date of Publication</th><th>Pages</th><th>Topic</th><th>Author Rank</th></tr></thead>";
	echo "<tbody>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		printf("<td> %s </td><td> %s </td><td> %s </td><td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td> ",$row["fname"], $row["fid"], $row["pname"], $row['dop'],$row['pages'], $row['topic'], $row["Arank"]);
		echo "</tr>";
	}
	echo "</tbody></table></div>";
	$result->free();

}



$sql = "SELECT pname, dos, budget, sponsor from  project where pname LIKE \"%$word%\" or sponsor LIKE \"%$word%\" ORDER BY dos DESC";
$result = $con->query($sql);

if($result)
{
	echo "<h1> Projects on $word: <br> </h1>";
	echo "<div class=\"table-wrapper\"><table class=\"fl-table\">";
	echo "<thead><tr><th>Name</th><th>Date of Start</th><th>Budget</th><th>Sponsor</th></tr></thead>";
	echo "<tbody>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		printf("<td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td> ",$row["pname"], $row['dos'],$row['budget'], $row['sponsor'] );
		echo "</tr>";
	}
	echo "</tbody></table></div>";

	$result->free();
}



$sql = "SELECT faculty.fname, faculty.fid, pname, dos, budget, sponsor, role from faculty, project, takes where takes.fid = faculty.fid and takes.pid = project.pid and ( project.pname LIKE \"%$word%\"  or project.sponsor LIKE \"%$word%\" )   ORDER BY project.dos DESC";
$result = $con->query($sql);


if($result)
{
	echo "<h3> faculty projects on $word : <br> </h3>";
	echo "<div class=\"table-wrapper\"><table class=\"fl-table\">";
	echo "<thead><tr><th>Name of faculty</th><th>faculty id</th><th>Name of project</th><th>Date of Start</th><th>Budget</th><th>Sponsor</th><th>Role</th></tr></thead>";
	echo "<tbody>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		printf("<td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td> <td> %s </td>",$row["fname"], $row["fid"], $row["pname"], $row['dos'],$row['budget'], $row['sponsor'], $row['role'] );
		echo "</tr>";
	}
	echo "</tbody></table></div>";

	$result->free();
}
echo "<br><br><center><a href = http://localhost:8001/> Home </a></center>";	
$con->close();

?>


</html>