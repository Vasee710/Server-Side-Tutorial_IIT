<?php
session_start();
include ("db.php");

$pagename = "Process Orders"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file
include ("detectlogin.php");

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage

$userType = $_SESSION['user_type'];


if($userType == 'Administrator'){
//inner joining the 4 tables to get the required output
    $sql = "SELECT *
            FROM orders
            INNER JOIN users
            ON orders.userId = users.userId
            INNER JOIN order_line
            ON orders.orderNo = order_line.orderNo
            INNER JOIN product
            ON order_line.prodId = product.prodId";

    $exeSQL = mysqli_query($conn, $sql) or die ("Error in SQL code");
    echo "hello";
    echo "<table style = 'width = 100%; font-size: 11.5px'>";
    //this variable is to check whether the row has the same order no or different one in order to generate the graph
    $tempOrderNo = 0;
    while($arrayp = mysqli_fetch_array($exeSQL)){

        if($arrayp['orderNo'] != $tempOrderNo){
            echo "<tr> <th width = '2%'> Order No </th> <th width = '34%'> Order Date Time </th> <th width = '2%'> User Id </th> <th width = '10%'> First Name </th> <th width = '10%'> Surname </th> <th width = '17%'> Order Status </th> <th width = '23%'> Product Name </th> <th width = '2%'> Product Quantity </th> </tr>";
            echo "<tr>";
            echo "<th>".$arrayp['orderNo']."</th>";
            echo "<td>".$arrayp['orderDateTime'] ."</td> <td>".$arrayp['userId']."</td> <td>".$arrayp['userFName']."</td> <td>". $arrayp['userSName'] ."</td> <td>".$arrayp['orderStatus']."</td> <td>".$arrayp['prodName'] ."</td> <td>".$arrayp['quantityOrdered'] ."</td>";
            echo "</tr>";
        }else{
            echo "<tr>";
            echo "<td colspan = '6'> </td> <td>".$arrayp['prodName'] ."</td> <td>".$arrayp['quantityOrdered'] ."</td>";
            echo "</tr>";
        }
        
        echo "<p> </p>";

        $tempOrderNo = $arrayp['orderNo'];
        
    }
    echo "</table>";

}else{
    echo "<p> You are not an administrator to view this page </p>";
}
include ("footfile.html"); //include footer layout

echo "</body>";
?>