<?php
session_start();
include ('db.php');

$pagename = "Add Product Confirmation"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage

//initiating the variables
if(isset($_POST['productName']) && ($_POST['smallPictureName']) && ($_POST['largePictureName']) && ($_POST['shortDescription']) && ($_POST['longDescription']) && ($_POST['price']) && ($_POST['stockQuantity'])){
    $productName = $_POST['productName'];
    $smallPictureName = $_POST['smallPictureName'];
    $largePictureName = $_POST['largePictureName'];
    $shortDescription = $_POST['shortDescription'];
    $longDescription = $_POST['longDescription'];
    $price = $_POST['price'];
    $stockQuantity = $_POST['stockQuantity'];

    $sql = "INSERT INTO product(prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity) VALUES ('{$productName}', '{$smallPictureName}', '{$largePictureName}', '{$shortDescription}', '{$longDescription}', '{$price}', '{$stockQuantity}') ";
    $executeQuery = mysqli_query($conn, $sql);
    $errNo = mysqli_errno($conn);

    if($errNo == 0){
        echo "<p> Product is successfully added to the system </p>";
        echo "<h5> Details of the product </h5>";
        echo "<p>Name: $productName </p>";
        echo "<p>Large Picture Name: $largePictureName </p>";
        echo "<p>Small picture Name: $smallPictureName </p>";
        echo "<p>Short Description: $shortDescription </p>";
        echo "<p>Long Description: $longDescription </p>";
        echo "<p>Price: &#163 $price </p>";
        echo "<p>Quantity: $stockQuantity </p>";
    }else{
        echo "<p> There is an error in adding the product </p>";
        if($errNo == 1062){
            echo "<p> The product name already exists </p>";
            echo "<p> Click <a href = 'addproduct.php' style = 'color:black'> Add Product </a> to add again </p>";
        }else if($errNo == 1064){
            echo "<p> Invalid characters have been entered. Please add again </p>";
            echo "<p> Click <a href = 'addproduct.php' style = 'color:black'> Add Product </a> to add again </p>";
        }else if($errNo == 1054){
            echo "<p> You have entered wrong type of input in place of numbers </p>";
            echo "<p> Click <a href = 'addproduct.php' style = 'color:black'> Add Product </a> to add again </p>";
        }
    }
}else{
    echo "<p> At least one field is empty. Please enter again. </p>";
}



include ("footfile.html"); //include footer layout

echo "</body>";
?>