<?php


$servername = "localhost";
$username = "admin";
$password = "admin_123789";
$dbname = "webdev";


$un_ = $_REQUEST['usern_'];
$pn_ = $_REQUEST['passn_'];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT id, username, FullName , password, phone, email,SSNumber,BirthDate FROM user ";

// = "SELECT id, username, password, phone, email,SSNumber,BirthDate FROM user  where username=$un_ and password = $pn_";

$result = mysqli_query($conn, $sql);

$ok = 0;

if (mysqli_num_rows($result) > 0) {
// output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        
        if ($row["username"] == $un_ && $row["password"] == $pn_) {
            $ok = 1;
            $uf = $row["FullName"];
            $ue = $row["email"];
            $ui = $row["id"];
        }
    }
}

if ($ok == 1) {

    echo "Welcome:".$uf."<br>";
    echo "your email :".$ue;

} else {
    echo "Incorrect Data or Account does not exist";
}


?>