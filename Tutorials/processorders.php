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


if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Administrator'){
    if(isset($_POST['orderNoToUpdate'])){
        $orderNoToUpdate = $_POST['orderNoToUpdate'];
        $newStatus = $_POST['updateStatus'];

        $sql = "UPDATE orders SET orderStatus = '$newStatus' WHERE orderNo = $orderNoToUpdate";
        $exeSQL = mysqli_query($conn, $sql);
        echo "<p> Status updated successfully </p>";
    }

//inner joining the 4 tables to get the required output (using ORDER BY to order the resultant table by the orderNo in order to print the output)
    $sql = "SELECT orders.orderNo, orders.orderDateTime, orders.userId, users.userFName, users.userSName, orders.orderStatus, product.prodName, order_line.quantityOrdered
    FROM orders
    INNER JOIN users
    ON orders.userId = users.userId
    INNER JOIN order_line
    ON orders.orderNo = order_line.orderNo
    INNER JOIN product
    ON order_line.prodId = product.prodId
    ORDER BY orders.orderNo";

    $exeSQL = mysqli_query($conn, $sql) or die ("Error in SQL code");
    echo "hello";
    echo "<table style = 'width = 100%; font-size: 11.5px'>";
    //this variable is to check whether the row has the same order no or different one in order to generate the graph
    $tempOrderNo = 0;
    while($arrayp = mysqli_fetch_array($exeSQL)){
        $orderNo = $arrayp['orderNo'];
        if($orderNo != $tempOrderNo){
            echo "<tr> <th width = '2%'> Order No </th> <th width = '24%'> Order Date Time </th> <th width = '2%'> User Id </th> <th width = '10%'> First Name </th> <th width = '10%'> Surname </th> <th width = '27%'> Order Status </th> <th width = '23%'> Product Name </th> <th width = '2%'> Product Quantity </th> </tr>";
            echo "<tr>";
            echo "<th>".$arrayp['orderNo']."</th>";
            echo "<td>".$arrayp['orderDateTime'] ."</td> <td>".$arrayp['userId']."</td> <td>".$arrayp['userFName']."</td> <td>". $arrayp['userSName'] ."</td>";
            echo "<td>";
            $orderStatus = $arrayp['orderStatus'];
            if($orderStatus == 'Placed'){
                echo "<form action = 'processorders.php' method = 'post'>";
                echo "<select name = 'updateStatus'>";
                echo "<option value = $orderStatus> $orderStatus </option>";
                echo "<option value = 'Ready to Collect'> Ready to Collect </option>";
                echo "</select> &nbsp";
                echo "<input type = 'submit' value = 'Update'/>";
                echo "<input type = 'hidden' name = 'orderNoToUpdate' value = '$orderNo'/>";
                echo "</form>";
            }else if($orderStatus == 'Ready to Collect'){
                echo "<form action = 'processorders.php' method = 'post'>";
                echo "<select name = 'updateStatus'>";
                echo "<option value = $orderStatus> $orderStatus </option>";
                echo "<option value = 'Collected'> Collected </option>";
                echo "</select> &nbsp";
                echo "<input type = 'submit' value = 'Update'/>";
                echo "<input type = 'hidden' name = 'orderNoToUpdate' value = '$orderNo'/>";
                echo "</form>";
            }else if($orderStatus == 'Collected'){
                echo "<b> $orderStatus </b>";
            }
            echo "</td>";
            echo " <td>".$arrayp['prodName'] ."</td> <td>".$arrayp['quantityOrdered'] ."</td>";
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
    echo "<p> You are not logged in nor you are an administrator to view this page </p>";
}
include ("footfile.html"); //include footer layout

echo "</body>";
?>