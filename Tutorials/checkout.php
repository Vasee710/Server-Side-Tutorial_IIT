<?php
session_start();
include ("db.php");

$pagename = "Check Out"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file
include ("detectlogin.php");

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage

$userid = $_SESSION['userid'];
$datetime = date('Y-m-d H:i:s');
$currentdatetime = mysqli_real_escape_string($conn, $datetime);

$sql = "INSERT INTO orders (userId, orderDateTime) VALUES ($userid, '$currentdatetime')";
$executeQuery = mysqli_query($conn, $sql);

if(mysqli_errno($conn) == 0){
    $sql_2 = "SELECT MAX(orderNo) as maxNo from orders where userId = $userid";
    $executeQuery_2 = mysqli_query($conn, $sql_2);

    $arrayord = mysqli_fetch_array($executeQuery_2);
    $orderNo = $arrayord['maxNo'];
    echo "<p> Your order no: $orderNo is placed successfully</p>";
    echo "<p> Your basket is cleared </p>";

    echo "<table border = '0px'>";
    echo "<tr> <th>Product Name</th> <th>Price</th> <th>Quantity</th> <th>Sub Total</th> </tr> ";
    $total = 0;
    foreach ($_SESSION['basket'] as $newprodid => $reququantity) {
        $SQL = "SELECT prodId, prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity from Product where prodId = $newprodid";
        $exeSQL = mysqli_query($conn, $SQL) or die;
        $arrayp = mysqli_fetch_array($exeSQL);
        $subTotal = $arrayp['prodPrice'] * $reququantity;
        $total = $total + $subTotal;

        $prodid = $arrayp['prodId'];

        echo "<tr>";
        echo "<td> ".$arrayp['prodName']. "</td>";
        echo "<td>&#163 ". $arrayp['prodPrice']. "</td>";
        echo "<td>".$_SESSION['basket'][$newprodid]."</td>";
        echo "<td style = 'text-align: right'>&#163 ".$subTotal. "</td>";
        echo "<input type = 'hidden' name = 'id_To_Delete' value = ".$newprodid. ">";
        echo "</tr>";

        $sql_4 = "INSERT INTO order_line (orderNo, prodId, quantityOrdered, subTotal) VALUES ($orderNo, $prodid, $reququantity, $subTotal )";
        $executeQuery_4 = mysqli_query($conn, $sql_4);
    }
    echo "<tr>";
    echo "<td colspan = '3'> Grand Total </td> <td style = 'text-align: right'>&#163 ".$total."</td> ";
    echo "</tr>";
    echo "</table>";

    $sql_3 = "UPDATE orders SET orderTotal = $total WHERE orderNo = ".$orderNo;
    $executeQuery_3 = mysqli_query($conn, $sql_3);
    echo "<p> <a href = 'logout.php'> Log Out </a> </p>";
}else{
    echo mysqli_error($conn);
}
unset($_SESSION['basket']);

include ("footfile.html"); //include footer layout

echo "</body>";
?>