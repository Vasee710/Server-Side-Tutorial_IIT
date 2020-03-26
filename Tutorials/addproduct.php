<?php
session_start();

$pagename = "Add a New Product"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file
include ("detectlogin.php");

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage
echo "<br>";

if(isset($_SESSION['userid'])){
    $userType = $_SESSION['user_type'];
    if($userType == 'Administrator'){
        echo "<form action = 'addproduct_conf.php' method = 'post'>";

        echo "<table style = 'border-collapse:collapse'>";
        echo "<tr>";
        echo "<td> *Product Name: </td> <td> <input type = 'text' name = 'productName'/> </td> " ;
        echo "</tr>";
        echo "<tr>";
        echo "<td> *Small Picture Name: </td> <td>  <input type = 'text' name = 'smallPictureName'/> </td> " ;
        echo "</tr>";
        echo "<tr>";
        echo "<td> *Large Picture Name: </td> <td>  <input type = 'text' name = 'largePictureName'/> </td> " ;
        echo "</tr>";
        echo "<tr>";
        echo "<td> *Short Description: </td> <td> <textarea name = 'shortDescription' style = 'height: 50px'> </textarea> </td> " ;
        echo "</tr>";
        echo "<tr>";
        echo "<td> *Long Description: </td> <td> <textarea name = 'longDescription' style = 'height: 100px'></textarea> </td> " ;
        echo "</tr>";
        echo "<tr>";
        echo "<td> *Price: </td> <td>  <input type = 'number' name = 'price' step='.01'/> </td> " ;
        echo "</tr>";
        echo "<tr>";
        echo "<td> *Initial Stock Quantity: </td> <td>  <input type = 'number' name = 'stockQuantity'/> </td> " ;
        echo "</tr>";
        echo "<tr>";
        echo "<td> <input type = 'submit' value='Add Product'> </td> <td> <input type = 'reset' value = 'Clear Form'> </td>";
        echo "</tr>";

        echo "</table>";
        echo "</form>";
    }
}else{
    echo "<p> You are not logged in as admin to add products</p>";
}

include ("footfile.html"); //include footer layout

echo "</body>";
?>