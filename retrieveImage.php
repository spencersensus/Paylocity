<?php
//retrieves image for the personalized page from the About db 
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
   $id = $_GET['id'];
    $sql = "SELECT profilePicture FROM About where id = '$id'";
    $result = $conn->query($sql);
    }
    $row = $result->fetch_assoc();
    $e = $row["profilePicture"];
    $image = file_get_contents($e);
    header("Content-Type: image/jpeg");
    echo $image;
?>