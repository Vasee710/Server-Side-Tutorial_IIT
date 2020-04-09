<?php
session_start();
include ('db.php');

$pagename = "Add Rating Process"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file
include ("detectlogin.php");

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage

if(isset($_SESSION['userid'])){
    if(isset($_POST['rating_prodid'])){

        $userId = mysqli_real_escape_string($conn, $_SESSION['userid']);
        $prodId = mysqli_real_escape_string($conn, $_POST['rating_prodid']);
        $ratingTitle = mysqli_real_escape_string($conn, $_POST['ratingTitle']);
        $ratingScore = mysqli_real_escape_string($conn, $_POST['ratingAmount']);
        $ratingDescription = mysqli_real_escape_string($conn, $_POST['ratingDescrip']);
        
        $sql = "SELECT * FROM ratings WHERE userid = ".$userId. " AND prodId = ".$prodId;
        $exeSQL = mysqli_query($conn, $sql);
        $arrayp = mysqli_fetch_array($exeSQL);
        $count = 0;
        for($i = 0; $i < $arrayp['ratingId']; $i++){
            $count++;
        }

        if($count == 0){
            $sql2 = "INSERT INTO ratings(prodId, userId, rating, ratingTopic, ratingDescription) VALUES ('{$prodId}', '{$userId}', '{$ratingScore}', '{$ratingTitle}', '{$ratingDescription}')";
            $exeSQL2 = mysqli_query($conn, $sql2);
            $errNo = mysqli_errno($conn);
            
            if($errNo == 0){
                echo "<p> Rating inserted successfully </p>";
            }else{
                echo mysqli_error($conn);
            }
        }else{
            echo "<p>You have already reviewed this product. Therefore, updating the changes...</p>";
            $sql2 = "UPDATE ratings SET rating = '{$ratingScore}', ratingTopic = '{$ratingTitle}', ratingDescription = '{$ratingDescription}' WHERE userid = ".$userId. " AND prodId = ".$prodId;
            $exeSQL2 = mysqli_query($conn, $sql2);
            
            $errNo = mysqli_errno($conn);
            
            if($errNo == 0){
                echo "<p> Rating updated successfully </p>";
            }else{
                echo mysqli_error($conn);
            }
        }
    }
}

include ("footfile.html"); //include footer layout

echo "</body>";
?>