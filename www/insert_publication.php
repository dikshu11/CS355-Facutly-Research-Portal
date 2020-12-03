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
    <script language="Javascript">
               function hideA(x) {
                   if (x.checked) {
                     document.getElementById("A").style.display = "none";
                     document.getElementById("B").style.display = "block";
                   }
                 }

                 function hideB(x) {
                   if (x.checked) {
                     document.getElementById("B").style.display = "none";
                     document.getElementById("A").style.display = "block";
                   }
                 }
    </script>
<title>Add New Publication</title>
<link rel="stylesheet" href="p1_v2.css">
</head>

<?php
    $style = "style='display:none;'";
    $con = mysqli_connect("db","user","test","myDb");
    if(mysqli_connect_errno())
        echo "Failed to connect to MySQL: " . mysqli_connect_error();        // Checking connection


    if(isset($_POST['update'])){
        
        $pid = $_POST['pid'];  
        $page = $_POST['pages'];
        $name = $_POST['name'];
        $topic = $_POST['topic'];
        $dop = $_POST['dop'];
        $type = $_POST['type'];
        $cn = $_POST['cn'];
        $arank = $_POST['arank'];
        $fid = $_POST['fid'];
        $name_err = "";
        $pages_err = "";
        $topic_err = "";
        $dop_err = "";
        
        $sql = "UPDATE publications SET pname = '$name', pages = '$page', topic= '$topic', dop = '$dop' WHERE pubid = '$pid'";
        $sql1 =  "INSERT INTO author VALUES ('$fid', '$pid', '$arank');";

        if( $con->query($sql)   ){
            echo "<center>Publication Updated Successfully!!</center>";   
            echo "<br><br><center><a href = http://localhost:8001/> HOME </a></center>";
            $pid = $name = $bug = $sp = $fid = $role = $dos = "";
            $style = "style='display:none;'";
        }
        else{
            $style = "style='display:block;'";
            echo "<center>Project couldn't be updated. Please try again!!</center>";
        }

    }


    if(isset($_POST['submit'])){
        $pid = $_POST['pid'];  
        $page = $_POST['pages'];
        $name = $_POST['name'];
        $topic = $_POST['topic'];
        $dop = $_POST['dop'];
        $type = $_POST['type'];
        $cn = $_POST['cn'];
        $arank = $_POST['arank'];
        $fid = $_POST['fid'];
        $name_err = "";
        $pages_err = "";
        $topic_err = "";
        $dop_err = "";

        $sql="SELECT * FROM publications where pubid = '$pid' ";
        $result = $con->query($sql);
        $rowcount = mysqli_num_rows($result);

        if($rowcount > 0){
            $row=mysqli_fetch_assoc($result); 
            if($row['pname'] != $name)
                $name_err = "*Publication name doesn't match existing value: ".$row['pname'];
            if($row['pages'] != $page)
                $pages_err = "*Publication pages doesn't match existing value: ".$row['pages'];
            if($row['topic'] != $topic)
                $topic_err = "*Publication topic doesn't match existing value: ".$row['topic'];
            if($row['dop'] != $dop)
                $dop_err = "*Publication date of publish doesn't match existing value: ".$row['dop'];

            if($row['pname'] != $name or $row['pages'] != $page or $row['topic'] != $topic or $row['dop'] != $dop){
                $style = "style='display:block;'";
            }
            else{
                $sql1 = "INSERT INTO author VALUES ('$fid', '$pid', '$arank');";
                echo "<center>Publication Added Successfully!!</center>";   
                echo "<br><br><center><a href = http://localhost:8001/> HOME </a></center>";
                $pid = $name = $page = $topic = $type = $cn = $arank = $fid = $dop = "";
                $name_err = $pages_err = $topic_err = $dop_err = "";
            }
        }
        else{

            $sql = "INSERT INTO publications VALUES ('$pid', '$name', '$dop', '$page', '$topic');";
            $sql2 = "INSERT INTO author VALUES ('$fid', '$pid', '$arank');";

            if($con->query($sql) and $con->query($sql2) ){
                if($type == 'Conference'){
                    $sql1 = "INSERT INTO conference VALUES ('$pid', '$cn');";
                    $con->query($sql1);
                }
                else{
                    $sql1 = "INSERT INTO journal VALUES ('$pid', '$cn');";
                    $con->query($sql1);
                }
                echo "<center>Publication successful added!!!</center>";
                echo "<br><br><center><a href = http://localhost:8001/> Home </a></center>";
            }
            else{
                echo "<center>Publication couldn't be added. Please try again!!</center>";
            }
        }
    }
    $con->close();
?>

<body>
<div class="left">  
        <form id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

            <h1>Enter details for new publication:</h1>
             Publication ID <br> 
            <input type="text" name="pid" value = "<?php echo $pid;?>"  required />
             Publication  Name 
            <input type="text" name="name" value = "<?php echo $name;?>"  required  />
            <?php echo "<span class=\"error\">";
                      printf("%s", $name_err);
                      echo "</span>";
            ?> <br>  <br>
             Pages in Publication  
            <input type="text" name="pages" value = "<?php echo $page;?>"  required /><?php echo "<span class=\"error\">";
                      printf("%s", $pages_err);
                      echo "</span>";
            ?> <br><br> 
             Publication topic 
            <input type="text" name="topic" value = "<?php echo $topic;?>"  required /><?php echo "<span class=\"error\">";
                      printf("%s", $topic_err);
                      echo "</span>";
            ?> <br><br>
             Date of Publication
            <input type="date" name="dop" value = "<?php echo $dop;?>"  required /><?php echo "<span class=\"error\">";
                      printf("%s", $dop_err);
                      echo "</span>";
            ?> <br>
            <br><br>Conference/Journal<br>
            <select name="type" value = "<?php echo $type;?>">
                <option value="Conference">Conference</option>
                <option value="Journal">Journal</option>
            </select>
            <br><br>
            Name of Conference/Journal
            <input type="text" name="cn" value = "<?php echo $cn;?>" required />
            Your ID
            <input type="text" name="fid" value = "<?php echo $fid;?>" required />
            Your Author Rank
            <input type="text" name="arank" value = "<?php echo $arank;?>" required />
            <div <?php echo $style;?>> <input type="submit" id ="updateButton" name="update" value="Update publication data" /> </div>
            <input name="submit" type="submit" value = "Add publication">
        </fieldset>
    </form>
</div>


</body>
</html>



