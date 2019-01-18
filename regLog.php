<?php
//signUp is called when the user registers on the index.php page.
 function signUp($user,$pass,$email){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";

$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $sql = "INSERT INTO SignUp(userName,pass,email)
    VALUES ('$user','$pass','$email')";

    if($conn->query($sql) === TRUE){

    }
    else{
        echo "NOT A VALID QUERY";
    }
    }
}

//this adds the default picture into the db and is called upon registering.
function addDefault($picture,$id){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";

$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $sql = "INSERT INTO Customization(pictureURL,id)
    VALUES ('$picture','$id')";
    
    if($conn->query($sql) === TRUE){

    }
    else{
        
    }
}
}

//login is called when the user logs into the website after succesfully registering.
function login($user,$pass){
$servername = "us-cdbr-iron-east-01.cleardb.net";
$username = "b3c9fea6937492";
$password = "fd9d1b2a";
$dbname = "heroku_e93bbdae1c33363";

    $conn =  new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        $sql = "SELECT userName,pass,id FROM SignUp where userName = '$user' and pass = '$pass'";
        $result = $conn->query($sql);
    }
    return $result;
    
}



?>