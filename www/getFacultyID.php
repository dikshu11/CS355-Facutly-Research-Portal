<!DOCTYPE html>
<html>
<head>
    <title>Get Faculty ID</title>
    <link rel="stylesheet" href="p1_v2.css">
</head>

<?php

    $con = mysqli_connect("db","user","test","myDb");
    // Checking connection
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $sql = "select fid from faculty where fname LIKE \"%$name%\"";
            $result = $con->query($sql);

            if( $result and mysqli_num_rows($result)!=0 ){
                echo "<center><h1>Faculty ID:</h1>";
                while($row = $result->fetch_assoc()){
                    printf("<h3>%s<br></h3>",$row["fid"] ); 
                }
                echo "</center>";

            }
            else{
                echo "<h1>Name not in the database<br></h1>";
            }
                echo "<center><a href = http://localhost:8001/> Home </a></center>";    
            
            $con->close();
    }
    
?>

<body>
<div class="left">  
    <form id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <br><br><br><h1>Enter Name:</h1>
    Name<br>
    <input type="text" name="name"  value = ""  required  />
    <input type="submit" name="submit" value="Sign up" />

  </form>
  </div>
</body>
</html>

