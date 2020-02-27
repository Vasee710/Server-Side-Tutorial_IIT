<?php
session_start();
include ('db.php');

$pagename = "Your Sign Up Results"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage

//initiating the variables
if(isset($_POST['firstName'])&& $_POST['lastName'] && $_POST['address'] && $_POST['postcode'] && $_POST['telNo'] && $_POST['emailAddress'] && $_POST['password'] && $_POST['confirmPassword']){
         
    if($_POST['password'] == $_POST['confirmPassword']){

        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if(preg_match($_POST['emailAddress'], $regex)){

                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $address =$_POST['address'];
                $postcode =$_POST['postcode'];
                $telNo =$_POST['telNo'];
                $emailAddress =$_POST['emailAddress'];
                $password = $_POST['password'];

                $duplicate=mysqli_query($conn,"select * from user_login where userEmail = '$emailAddress'");
                if(mysqli_num_rows($duplicate) > 0){
                    echo "Email is already there. Please try again";
                }else {


                    $sql = "INSERT INTO users (userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) VALUES ('{$firstName}', '{$lastName}', '{$address}', '{$postcode}', '{$telNo}', '{$emailAddress}', '{$password}')";

                    if (mysqli_query($conn, $sql)) {
                        echo "<p>New record created successfully<p>";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
        }else{
            echo "<p> The email is not in the correct format";
        }
                    
    }else{
             echo "<p> The passwords don't match </p>";
         }
 }else{
     echo "<p>Atleast one field is empty &nbsp</p> <p> <a href = 'signup.php' style = 'color: black'> Click here to Sign Up </a> </p>";
 }


include ("footfile.html"); //include footer layout

echo "</body>";
?>