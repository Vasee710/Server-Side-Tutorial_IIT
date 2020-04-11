<?php
session_start();
include ('db.php');

$pagename = "Delete Rating"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file
include ("detectlogin.php");

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage

$prodid = $_GET['prod_id'];
$userid = $_GET['user_id'];

if(isset($_SESSION['userid'])){
    if(isset($prodid) and isset($userid)){
        $sql = "DELETE FROM ratings WHERE userId = ".$userid." AND prodId = ".$prodid;
        $exeSQL = mysqli_query($conn, $sql);
        $errNo = mysqli_errno($conn);
        if($errNo == 0){
            echo "<p> Your rating has been successfully deleted </p>";
        }else{
            echo mysqli_error($conn);
        }
    }
}

include ("footfile.html"); //include footer layout

echo "</body>";
?>