<?php
session_start();
include ('db.php');

$pagename = "Add Rating"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title
$prodid = $_GET['prod_id'];

echo "<body>";


include ("headfile.html");   //include header layout file
include ("detectlogin.php");

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage

if(isset($_SESSION['userid'])){

    $SQL = "SELECT prodId, prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity from Product where prodId = $prodid";
    //run SQL query for connected DB or exit and display error message
    $exeSQL = mysqli_query($conn, $SQL) or die;

    echo "<table style = 'border: 0px'>";

    //create an array of records and populate the arrays with the records got from the SQL
    //iterate through the array until the end is reached.

    while($arrayp = mysqli_fetch_array($exeSQL)){
        echo "<tr>";
        echo "<td style = 'border: 0px'>";
        //display the small image name which is in the db/array
        //echo "<a href = prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
        echo "<img src = images/".$arrayp['prodPicNameLarge']." height = 250 width = 350>";
        echo "</a>";
        echo "</td>";
        echo "<td style = 'border : 0px'>";
        echo "<p><h5>".$arrayp['prodName']."</h5>"; //displaying the product name as in the array

        echo "<form action = 'add_rating_process.php' method = 'post'>";

        echo "<input size = '30' style = 'border: 2px solid CornflowerBlue; border-radius: 4px; padding: 5px 15px;' type = 'text' name = 'ratingTitle' placeholder = 'Enter the Title of your rating'/>";
        echo "<br><br>";
        echo "<textarea placeholder='Please give a description about the product... Critical reviews are encouraged.' style = 'border: 2px solid CornflowerBlue; border-radius: 4px;' rows = '10' cols = '50'  name = 'ratingDescrip'></textarea>";
        echo "<br><br>";
        echo "<p> Enter your rating: ";
        echo "<select name = 'ratingAmount' style = 'width: 50px'>";

        for($i = 0; $i <= 5; $i++){
            echo "<option value = ".$i.">$i</option>";
        }
        echo "</select> </p><br/>";

        echo "<input type = 'submit' value = 'Submit Rating'>";
        //pass the product id to the next page basket.php as a hidden value
        echo "<input type = 'hidden' name = 'rating_prodid' value = ".$prodid. ">";
        echo "</form>";

        echo "</td>";
        echo "</tr>";

    }
    echo "</table>";

}


include ("footfile.html"); //include footer layout

echo "</body>";
?>