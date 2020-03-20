<?php
if(isset($_SESSION['userid'])){
    $fName = $_SESSION['fname'];
    $sName = $_SESSION['sname'];
    $userId = $_SESSION['userid'];
    echo "<div style = 'float: right'>";
    echo "<span style = 'text-align: right'> $fName $sName / Customer No: $userId </span>";
    echo "</div>";
}

?>