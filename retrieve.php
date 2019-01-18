<?php
//These functions retrieve the elements given from the corrosponding db and return the results.
require_once "getId.php";
 function retrieveProfileInfo($element){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $user = $_SESSION['user'];
    $id = getId($user);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "SELECT $element FROM SignUp where id = '$e'";
    $result = $conn->query($sql);
    }
    return $result;
}

 function retrieveBillingInfo($element){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $user = $_SESSION['user'];
    $id = getId($user);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "SELECT $element FROM Payment where id = '$e'";
    $result = $conn->query($sql);
    }
    return $result;
}
function retrieveHistoryInfo($element){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $user = $_SESSION['user'];
    $id = getId($user);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "SELECT $element FROM History where id = '$e'";
    $result = $conn->query($sql);
    }
    return $result;
}

function retrieveCustomInfo($element){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $user = $_SESSION['user'];
    $id = getId($user);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "SELECT $element FROM Customization where id = '$e'";
    $result = $conn->query($sql);
    }
    return $result;
}

function retrieveAboutInfo($element){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $user = $_SESSION['user'];
    $id = getId($user);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "SELECT $element FROM About where id = '$e'";
    $result = $conn->query($sql);
    }
    return $result;
}

function retrieveWorkHistoryInfo($element){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $user = $_SESSION['user'];
    $id = getId($user);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "SELECT $element FROM WorkHistory where id = '$e'";
    $result = $conn->query($sql);
    }
    return $result;
}

function retrieveReferenceInfo($element){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $user = $_SESSION['user'];
    $id = getId($user);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "SELECT $element FROM Reference where id = '$e'";
    $result = $conn->query($sql);
    }
    return $result;
}

function retrievePorfolioInfo($element){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $user = $_SESSION['user'];
    $id = getId($user);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "SELECT $element FROM Porfolio where id = '$e'";
    $result = $conn->query($sql);
    }
    return $result;
}

function retrieveSkillsInfo($element){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $user = $_SESSION['user'];
    $id = getId($user);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "SELECT $element FROM Skills where id = '$e'";
    $result = $conn->query($sql);
    }
    return $result;
}

function retrievePersonalizedInfo($element){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $user = $_SESSION['user'];
    $id = getId($user);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "SELECT $element FROM Personalized where id = '$e'";
    $result = $conn->query($sql);
    }
    return $result;
}




?>