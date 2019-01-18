<?php
//these functions all insert data from the forms in the account.php,creationPage.php and index.php pages.
session_start();
require_once "getId.php";
 function insertProfileInfo($user,$pass,$email,$state,$zip,$city,$address,$oldUser,$phone,$name){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $id = getId($oldUser);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $setForeign = "SET FOREIGN_KEY_CHECKS=0";
    if($conn->query($setForeign) === TRUE){
    }
    $sql = "REPLACE INTO SignUp(userName,pass,email,Addr,City,State,zip,id,phone,name)
    VALUES ('$user','$pass','$email','$address','$city','$state','$zip','$e','$phone','$name')";
    if($conn->query($sql) === TRUE){
    }
    else{
        echo "NOT A VALID QUERY";
    }
    $setForeign2 = "SET FOREIGN_KEY_CHECKS=1";
    if($conn->query($setForeign2) === TRUE){
    }
    }
}

function insertBitInfo($oldUser,$bit){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $id = getId($oldUser);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "REPLACE INTO Personalized(personalized,id)
    VALUES ('$bit','$e')";
    if($conn->query($sql) === TRUE){
    }
    else{
        echo $sql;
        echo "NOT A VALID QUERY Person";
    }
    }
}

function insertBillingInfo($oldUser,$name,$cardNumber,$code,$expDate){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $id = getId($oldUser);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "REPLACE INTO Payment(nameCard,cardNumber,securityCode,expDate,id)
    VALUES ('$name','$cardNumber','$code','$expDate','$e')";
    if($conn->query($sql) === TRUE){
    }
    else{
        echo "NOT A VALID QUERY";
    }
    }
}

function insertHistory($oldUser,$comm,$date){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $id = getId($oldUser);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "INSERT INTO History(comm,commDate,id)
    VALUES ('$comm','$date','$e')";
    if($conn->query($sql) === TRUE){

    }
    else{
        echo $sql;
        echo "NOT A VALID QUERY";
    }
    }
}


 function insertCustomizationInfo($oldUser,$color,$font,$picture){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    
    $id = getId($oldUser);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "REPLACE INTO Customization(backgroundColor,font,pictureURL,id)
    VALUES ('$color','$font','$picture','$e')";
    if($conn->query($sql) === TRUE){
    }
    else{
        echo "NOT A VALID QUERY";
    }
    }
}

function insertSkillInfo($oldUser,$skill,$creationSkill){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $id = getId($oldUser);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "INSERT INTO Skills(skill,creationSkill,id)
    VALUES ('$skill','$creationSkill','$e')";
    if($conn->query($sql) === TRUE){
      
    }
    else{
        echo "NOT A VALID QUERY Skill";
    }
    }
}

function insertPersonalInfo($oldUser,$name,$email,$phone,$bio,$profilePicture){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $id = getId($oldUser);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "REPLACE INTO About(name,email,phone,bio,profilePicture,id)
    VALUES ('$name','$email','$phone','$bio','$profilePicture','$e')";
    if($conn->query($sql) === TRUE){
       
    }
    else{
        echo $sql;
        echo "NOT A VALID QUERY Pers";
    }
    }
}

function insertCompanyInfo($oldUser,$company,$phone,$city,$address,$state,$zip,$workDescription){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $id = getId($oldUser);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "INSERT INTO WorkHistory(company,phone,city,address,state,zip,workDescription,id)
    VALUES ('$company','$phone','$city','$address','$state','$zip','$workDescription','$e')";
    if($conn->query($sql) === TRUE){
      
    }
    else{
        echo $sql;
        echo "NOT A VALID QUERY WorkHistory";
    }
    }
}

function insertReferenceInfo($oldUser,$reference,$refPhone,$email,$relationship){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $id = getId($oldUser);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "INSERT INTO Reference(referenceName,referencePhone,referenceEmail,referenceRelationship,id)
    VALUES ('$reference','$refPhone','$email','$relationship','$e')";
    if($conn->query($sql) === TRUE){
       
    }
    else{
        echo $sql;
        echo "NOT A VALID QUERY Reference";
    }
    }
}

function insertPorfInfo($oldUser,$language,$project,$description,$link){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
$conn =  new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $id = getId($oldUser);
    $row = $id->fetch_assoc();
    $e = $row["id"];
    $sql = "INSERT INTO Porfolio(language,project,description,projectLink,id)
    VALUES ('$language','$project','$description','$link','$e')";
    if($conn->query($sql) === TRUE){
        
    }
    else{
        echo "NOT A VALID QUERY Porf";
    }
    }
}



?>