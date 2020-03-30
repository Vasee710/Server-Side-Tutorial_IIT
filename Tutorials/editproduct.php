<?php
session_start();
include ("db.php");


$pagename = "View & Edit Products"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";
include ("headfile.html");   //include header layout file
include ("detectlogin.php");

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage
$userType = $_SESSION['user_type'];

if($userType == 'Administrator'){
    if(isset($_POST['id_To_Update'])){
        $prodtobeupdated = $_POST['id_To_Update'];
        $newprice = $_POST['updatePrice'];
        $newqutoadd = $_POST['editQuantity'];
        

        $sql2 = "SELECT prodQuantity FROM Product WHERE prodId = '{$prodtobeupdated}' ";
        $exeSQL2 = mysqli_query($conn, $sql2) or die;
        $arrayqu = mysqli_fetch_array($exeSQL2);
        $existingStock = $arrayqu['prodQuantity'];
        $newstock = $existingStock + $newqutoadd;

        if(!empty($newprice)){
            echo "Helloooo";
            $sql3 = "UPDATE Product SET prodQuantity = '{$newstock}', prodPrice = '{$newprice}' WHERE prodId = '{$prodtobeupdated}'";
            $exeSQL3 = mysqli_query($conn, $sql3);
            echo "<p> Product's price and stocks are updated </p>";
        }else{
            echo "Hellooo 2";
            $sql3 = "UPDATE Product SET prodQuantity = '{$newstock}' WHERE prodId = ".$prodtobeupdated;
            $exeSQL3 = mysqli_query($conn, $sql3);
            echo "<p>Product's stock has been updated</p>";
        }
    }


    //create a sql variable and populate it with a sql statement that gets the product details
    $SQL = "SELECT * from Product";
    //run SQL query for connected DB or exit and display error message
    $exeSQL = mysqli_query($conn, $SQL) or die;

    echo "<table style = 'border: 0px'>";

    //create an array of records and populate the arrays with the records got from the SQL
    //iterate through the array until the end is reached.

    while($arrayp = mysqli_fetch_array($exeSQL)){
        echo "<form action = 'editproduct.php' method = 'post'>";
        echo "<tr>";
        echo "<td style = 'border: 0px'>";
        //display the small image name which is in the db/array
        echo "<a href = prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
        echo "<img src = images/".$arrayp['prodPicNameSmall']." height = 180 width = 220>";
        echo "</a>";
        echo "</td>";
        echo "<td style = 'border : 0px'>";
        echo "<p><h5>".$arrayp['prodName']."</h5>"; //displaying the product name as in the array
        echo "<p>".$arrayp['prodDescripShort']."</p>"; // displaying the small description
        echo "<table style = 'border: 0px'>";
            echo "<tr> <td style = 'border: 0px'>";
            echo "<b> &#163 ".$arrayp['prodPrice']."</b> </td>";
            echo "<td style = 'border: 0px'>";
            echo "New Price: <input type = 'text' style = 'width: 85px' name = 'updatePrice'/>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style = 'border: 0px'> Current stock: <b>". $arrayp['prodQuantity']. "</b> </td>";
            echo "<td style = 'border: 0px'> Add number of items ";
            echo "<select name = 'editQuantity'>";
            for($i = 0; $i <= $arrayp['prodQuantity']; $i++){
                echo "<option value = ".$i.">$i</option>";
            }
            echo "</select>";
            echo "</td> </tr>";
            echo "<tr>";
            echo "<td style = 'border: 0px'> <input type = 'submit' value = 'Update'/> </td> </tr>";
            $prodid = $arrayp['prodId'];
            echo "<input type = 'hidden' name = 'id_To_Update' value = ".$prodid. ">";
            //echo "$prodid";
            echo "</table>";
        echo "</td>";
        echo "</tr>";
        echo "</form>";

    }
    echo "</table>";
}else{
    echo "<p> You are not signed in as Administrator to edit products </p>";
}

include ("footfile.html"); //include footer layout
echo "</body>";
?>