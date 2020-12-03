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

<style>
.error {color: #FF0000;}
</style>
<head>
    <title>New Project</title>
    <link rel="stylesheet" href="p1_v2.css">
</head>

<?php
    $style = "style='display:none;'";
    $con = mysqli_connect("db","user","test","myDb");
    if(mysqli_connect_errno())
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); // Checking connection

    if(isset($_POST['update'])){
        $pid = $_POST['id'];    
        $name = $_POST['name'];
        $bug = $_POST['budget'];
        $sp = $_POST['sponsor'];
        $fid = $_POST['fid'];
        $role = $_POST['role'];
        $dos = $_POST['dos'];
        $name_err = "";
        $bug_err = "";
        $sp_err = "";
        $dos_err = "";
        
        $sql = "UPDATE project SET pname = '$name', budget = '$bug', sponsor= '$sp', dos = '$dos'  WHERE pid = '$pid'";
        $sql1 = "INSERT INTO takes VALUES ('$pid', '$fid', '$role');";

        if( $con->query($sql)   ){
            echo "<center>Project Updated Successfully!!</center>";   
            echo "<br><br><center><a href = http://localhost:8001/index.php> HOME </a></center>";
            $pid = $name = $bug = $sp = $fid = $role = $dos = "";
            $style = "style='display:none;'";
        }
        else{
            $style = "style='display:block;'";
            echo "<center>Project couldn't be updated. Please try again!!</center>";
        }

    }

    if(isset($_POST['submit'])){
        $pid = $_POST['id']; 	
        $name = $_POST['name'];
        $bug = $_POST['budget'];
        $sp = $_POST['sponsor'];
        $fid = $_POST['fid'];
        $role = $_POST['role'];
        $dos = $_POST['dos'];
        $name_err = "";
        $bug_err = "";
        $sp_err = "";
        $dos_err = "";

        $sql="SELECT * FROM project where pid = '$pid' ";
        $result = $con->query($sql);
        $rowcount = mysqli_num_rows($result);

        if($rowcount > 0){
            $row=mysqli_fetch_assoc($result); 
            if($row['pname'] != $name)
                $name_err = "*Project name doesn't match existing value: ".$row['pname'];
            if($row['budget'] != $bug)
                $bug_err = "*Project budget doesn't match existing value: ".$row['budget'];
            if($row['sponsor'] != $sp)
                $sp_err = "*Project sponsor doesn't match existing value: ".$row['sponsor'];
            if($row['dos'] != $dos)
                $dos_err = "*Project date of start doesn't match existing value: ".$row['dos'];

            if($row['pname'] != $name or $row['budget'] != $bug or $row['sponsor'] != $sp or $row['dos'] != $dos){
                $style = "style='display:block;'";
            }
            else{
                $sql1 = "INSERT INTO takes VALUES ('$pid', '$fid', '$role');";
                    echo "<center>Project Added Successfully!!</center>";   
                    echo "<br><br><center><a href = http://localhost:8001/index.php> Go to Home </a></center><br><br>";
                    $pid = $name = $bug = $sp = $fid = $role = $dos = "";
            }
            

        }else{
            $sql = "INSERT INTO project VALUES ('$pid', '$name', '$bug', '$sp', '$dos');";
            $sql1 = "INSERT INTO takes VALUES ('$pid', '$fid', '$role');";

            if( $con->query($sql) and $con->query($sql1) ){
                echo "<center>Project Added Successfully!!</center>";   
                echo "<br><br><center><a href = http://localhost:8001/index.php> Go to Home </a></center><br><br>";                
                $pid = $name = $bug = $sp = $fid = $role = $dos = "";
            }
            else{
                echo "<center>Project couldn't be added. Please try again!!</center>";
            }
        }

    }
    $con->close();
?>

<body>
    <div class="left">  
        <form id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
               <br><h1>Enter details for new project:</h1>
                <br> Project ID <br> 
                <input type="text" name="id" value = "<?php echo $pid;?>"  required  />
                Project Name:
                <input type="text" name="name" value = "<?php echo $name;?>"  required  />
                <?php echo "<span class=\"error\">";
                      printf("%s", $name_err);
                      echo "</span>";
                ?> <br> 
                 Project Budget
                <input type="text" name="budget" value = "<?php echo $bug;?>" required />
                <?php echo "<span class=\"error\">";
                      printf("%s", $bug_err);
                      echo "</span>";
                ?> <br>
                Project Sponsor 
                <input type="text" name="sponsor" value = "<?php echo $sp;?>" required />
                <?php echo "<span class=\"error\">";
                      printf("%s", $sp_err);
                      echo "</span>";
                ?><br><br>
                 Date of Start
                <input type="date" name="dos" value = "<?php echo $dos;?>" required /><br>
                <?php echo "<span class=\"error\">";
                      printf("%s", $dos_err);
                      echo "</span>";
                ?> <br>
                <br>Your ID
                <input type="text" name="fid" value = "<?php echo $fid;?>" required />
                Your Role
                <input type="text" name="role" value = "<?php echo $role;?>" required />
                <div <?php echo $style;?>> <input type="submit" id ="updateButton" name="update" value="Update project data" /> </div>
                <input type="submit" name="submit" value="Add project" />
                

        </form>
    </div>
</body>


</html>

