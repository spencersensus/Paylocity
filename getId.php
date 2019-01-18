<?php
  function getId($user){
      session_start();
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
    $conn =  new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        $sql = "SELECT id FROM SignUp where userName = '$user'";
        $result = $conn->query($sql);
    }
    return $result;
    
}

?>