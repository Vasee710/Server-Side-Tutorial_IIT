<?php
include ('db.php');

$pagename = "A smart buy for a smart home"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title
//get the product id from the previous page using GET and the $_GET superglobal variable
//applied to the query strin u_prod_id
//store the value in a local variable called $prodid
$prodid = $_GET['u_prod_id'];

//display the value of the product id, for debugging purposes
//echo "<p>Selected produc Id: ".$prodid;

echo "<body>";

include ("headfile.html");   //include header layout file

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage

//create a sql variable and populate it with a sql statement that gets the product details
$SQL = "SELECT prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity from Product where prodId = $prodid";
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
    echo "<p style = 'text-align:justify'>".$arrayp['prodDescripLong']."</p>"; // displaying the small description
    echo "<b> &#163 ".$arrayp['prodPrice']."</b><br/>";
    echo "<p>Remaining: ".$arrayp['prodQuantity']."</p>";

    echo "<p>Number of ".$arrayp['prodName']." to be purchased: ";
    //create form made of 1 text field and one button for user to enter quantity
    //the value entered in the form will be posted to the basket.php to be processed
    echo "<form action = basket.php method = post>";
    //echo "<input type = 'text' name = 'p_quantity' size = '5' maxlength = '3'> <br/><br/>";
    echo "<select name = 'p_quantity' style = 'width: 50px'>";
    for($i = 1; $i <= $arrayp['prodQuantity']; $i++){
        echo "<option value = ".$i.">$i</option>";
    }
    echo "</select><br/><br/>";
    
    echo "<input type = 'submit' value = 'ADD TO BASKET'>";
    //pass the product id to the next page basket.php as a hidden value
    echo "<input type = 'hidden' name = 'h_prodid' value = ".$prodid. ">";
    echo "</form>";

    echo "</td>";
    echo "</tr>";

}
echo "</table>";

include ("footfile.html"); //include footer layout
echo "</body>";
?>