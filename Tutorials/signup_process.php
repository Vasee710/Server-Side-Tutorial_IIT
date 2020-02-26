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
//if(isset($_POST['submit'])){
//         if($_POST['password'] == $_POST['confirmPassword']){

                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $address =$_POST['address'];
                $postcode =$_POST['postcode'];
                $telNo =$_POST['telNo'];
                $emailAddress =$_POST['emailAddress'];
                $password = $_POST['password'];


                $sql = "INSERT INTO users (userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) VALUES ('{$firstName}', '{$lastName}', '{$address}', '{$postcode}', '{$telNo}', '{$emailAddress}', '{$password}')";

                if (mysqli_query($conn, $sql)) {
                        echo "<p>New record created successfully<p>";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    
//         }
// }


include ("footfile.html"); //include footer layout

echo "</body>";
?>