<?php
session_start();
include ("db.php");

$pagename = "Clear Smart Market"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage

unset ($_SESSION['basket']);
echo "<p style = 'text-align:center; font-weight: bold'> Your Basket has been cleared </p>";


include ("footfile.html"); //include footer layout

echo "</body>";
?>