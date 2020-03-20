<?php
session_start();

$pagename = "Sign In"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage
echo "<br>";
echo "<form action = 'login_process.php' method = 'post'>";

echo "<table style = 'border-collapse:collapse'>";
echo "<tr>";
echo "<td> Email: </td> <td> <input type = 'text' name = 'emailAddress'/> </td> " ;
echo "</tr>";
echo "<tr>";
echo "<td> Password: </td> <td>  <input type = 'password' name = 'password'/> </td> " ;
echo "</tr>";
echo "<tr>";
echo "<td> <input type = 'submit' value='Log In'> </td> <td> <input type = 'reset' value = 'Clear Form'> </td>";
echo "</tr>";

echo "</table>";

include ("footfile.html"); //include footer layout

echo "</body>";
?>