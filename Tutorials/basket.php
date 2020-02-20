<?php
session_start();
include ('db.php');


$pagename = "Smart Basket"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage


if (isset($_POST['h_prodid'])) {
    $newprodid = $_POST['h_prodid'];
    $reququantity = $_POST['p_quantity'];
    echo "Product ID: ".$newprodid;
    echo "<br/>Quantity: ".$reququantity;
    //create a new cell in the basket session array. Index this cell with the new product id.
    //inside the cell store, the required product quantity
    $_SESSION['basket'][$newprodid] = $reququantity;
    echo "<p>Item ID ".$newprodid. " with quantity ".$reququantity. "is added." ;

    
} else {
    echo "<p> Current Basket is unchanged </p>";
}

//if(isset($_POST['h_prodid'])){

    //table for the basket session
    echo "<table border = '0px'>";
    echo "<tr> <th>Product Name</th> <th>Price</th> <th>Quantity</th> <th>Sub Total</th> </tr>";

    if(isset($_SESSION['basket'])){
        $total = 0;
        foreach ($_SESSION['basket'] as $newprodid => $reququantity) {
            $SQL = "SELECT prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity from Product where prodId = $newprodid";
            $exeSQL = mysqli_query($conn, $SQL) or die;
            $arrayp = mysqli_fetch_array($exeSQL);
            $subTotal = $arrayp['prodPrice'] * $reququantity;
            $total = $total + $subTotal;
            echo "<tr>";
            echo "<td> ".$arrayp['prodName']. "</td>";
            echo "<td>&#163 ". $arrayp['prodPrice']. "</td>";
            echo "<td>".$_SESSION['basket'][$newprodid]."</td>";
            echo "<td style = 'text-align: right'>&#163 ".$subTotal. "</td>";
            echo "</tr>";
            
            
        }
        echo "<tr>";
        echo "<td colspan = '3'> Grand Total </td> <td style = 'text-align: right'>&#163 ".$total."</td> ";
        echo "</tr>";
        echo "</table>";
        
    }else{
        echo "<h3> The Basket is Empty </h3>";
    }
    

//}

include ("footfile.html"); //include footer layout

echo "</body>";
?>