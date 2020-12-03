<?php
    @session_start();
    if(!isset($_SESSION['username'])){
         $home_url = 'http://' . $_SERVER['HTTP_HOST'] .'/login.php';
         header('Location: ' . $home_url);
    }
    //echo $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Faculty</title>
    <link rel="stylesheet" href="p1_v2.css">
</head>

<?php

    $con = mysqli_connect("db","user","test","myDb");
    // Checking connection
    if(mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(isset($_POST['submit'])){
            $fid = $_POST['fid'];    
            $name = $_POST['name'];
            $dept = $_POST['dept'];
            $doj = $_POST['doj'];
            $designation = $_POST['designation'];

        $sql = "INSERT INTO faculty VALUES ('$fid', '$name', '$dept', '$doj', '$designation');";
        if( !$con->query($sql) ){

            $error_message = "";
            if (strpos($con->error, "Duplicate entry") === false) {
                $error_message = "Insertion Failed!!!";
            }
            else
               $error_message = "Insertion Failed: Duplicate Faculty ID"; 
            echo "<h1><b><center>$error_message</center></b></h1>";
        }
        else{
            echo "<h1><b><center>Successfully added!!!</b></center></h1>";
            echo "<h1><br><br><center><a href = http://localhost:8001/> Home </a></center></h1>";
            $fid = $name = $dept = $doj =  $designation = "";
        }
        $con->close();
    }
    
?>




<body>
<div class="left">  
    <form id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <h1>Enter details for new faculty member:</h1>
    Faculty ID<br>
    <input type="text" name="fid"  value = "<?php echo $fid;?>" required />
    Name<br>
    <input type="text" name="name"  value = "<?php echo $name;?>"  required  />
    Department<br><br>
    <select name="dept" value = "<?php echo $dept;?>">
        <option value="CSE">Computer Science and Engineering</option>
        <option value="ME">Mechanical Engineering</option>
        <option value="CEE">Civil and Environmental Engineering</option>
        <option value="CBE">Chemical and Biochemical Engineering</option>
        <option value = "EE">Electrical Engineering</option>
        <option value = "MME">Metallurgical and Materials Engineering</option>
        <option value = "CH">Chemistry</option>
        <option value = "PH">Physics</option>
        <option value = "MA">Maths</option>
    </select>


    <br><br>Date of Joining<br>
    <input type="date" name="doj" value = "<?php echo $doj;?>" required/>
    <br><br>Designation<br>
    <input type="text" name="designation" value = "<?php echo $designation;?>" required/>
    <input type="submit" name="submit" value="Sign up" />

  </form>
  </div>
</body>
</html>

