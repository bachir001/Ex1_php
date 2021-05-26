<?php

$servername = "localhost";
$username = "admin";
$password = "admin_123789";
$dbname = "webdev";



$fn = $_REQUEST['FullN'];
$cn = $_REQUEST['confirm'];
$en = $_REQUEST['emailn'];
$un = $_REQUEST['usern'];
$pn = $_REQUEST['passn'];
$ph = $_REQUEST['phn'];
$bir = $_REQUEST['birthn'];
$ssn = $_REQUEST['ssnum'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


 
$sql_1 = "INSERT INTO user (FullName, phone, email, username, SSNumber,BirthDate,password)

VALUES ('$fn', '$ph', '$en', '$un', '$ssn','$bir','$pn')";

echo strlen($ph)>8 ;

if ($cn === $pn) {
    if (mysqli_query($conn, $sql_1)) {
        echo "New record created successfully";
    } else {
        
        echo "Error: " . $sql_1 . "<br>" . mysqli_error($conn);
        
    }
}else{
    echo"confirm password and password aren't the same";
}



mysqli_close($conn);


?>