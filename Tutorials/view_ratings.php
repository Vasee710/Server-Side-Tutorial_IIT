<?php
session_start();
include ('db.php');

$pagename = "View Ratings"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file
include ("detectlogin.php");

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage
$prodid = $_GET['prod_id'];

if(isset($prodid)){

    $sql = "SELECT ratings.rating, ratings.ratingTopic, ratings.ratingDescription, product.prodName, users.userFName, users.userSName from ratings
    JOIN
    users
    ON ratings.userId = users.userId
    JOIN product
    ON ratings.prodId = product.prodId
    WHERE
    ratings.prodId = ".$prodid;
    $exeSQL = mysqli_query($conn, $sql);

    $sql2 = "SELECT prodName from product WHERE prodId = ".$prodid;
    $exeSQL2 = mysqli_query($conn, $sql2);
    $arrayproduct = mysqli_fetch_array($exeSQL2);



    

    echo "<h5> Ratings for {$arrayproduct['prodName']} </h5>";
    echo "<table>";

    echo "<tr> <th> Reviewer Name </th> <th> Review Title </th> <th> Review Description </th> <th> Review Score </th>";
    while($arrayp = mysqli_fetch_array($exeSQL)){
        echo "<tr>";
        echo "<td> {$arrayp['userFName']} {$arrayp['userSName']} </td>";
        echo "<td> {$arrayp['ratingTopic']} </td>";
        echo "<td> {$arrayp['ratingDescription']} </td>";
        echo "<td> {$arrayp['rating']} </td>";
        echo "</tr>";
    }

    echo "</table>";

    $sql3 = "SELECT avg(rating) as average from ratings where prodId = $prodid";
    $exeSQL3 = mysqli_query($conn, $sql3);
    $ratingArray = mysqli_fetch_array($exeSQL3);
    $averageRating = $ratingArray['average'];
    echo "<p> <b> Average Rating: ". round($averageRating,2)." / 5 </b> </p>";
}

include ("footfile.html"); //include footer layout

echo "</body>";
?>