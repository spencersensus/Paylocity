<?php
//This file contains functions that take in an element and print the corrosponding row from the table in the db.
require_once "getId.php";
require_once "retrieve.php";
 function printProfileInfo($element){
    $result = retrieveProfileInfo($element);
    $row = $result->fetch_assoc();
    $e = $row[$element];
    echo $e;
}

 function printBillingInfo($element){
    $result = retrieveBillingInfo($element);
    $row = $result->fetch_assoc();
    $e = $row[$element];
    echo $e;
}
function printHistoryInfo($element){
    $result = retrieveHistoryInfo($element);
    $row = $result->fetch_assoc();
    $e = $row[$element];
    echo $e;
}

function printCustomInfo($element){
    $result = retrieveCustomInfo($element);
    $row = $result->fetch_assoc();
    $e = $row[$element];
    echo $e;
}
function printSkillsInfo($element){
    $result = retrieveSkillsInfo($element);
    $row = $result->fetch_assoc();
    $e = $row[$element];
    echo $e;
}
function printAboutInfo($element){
    $result = retrieveAboutInfo($element);
    $row = $result->fetch_assoc();
    $e = $row[$element];
    echo $e;
}


function printWorkHistoryInfo($element){
    $result = retrieveWorkHistoryInfo($element);
    $row = $result->fetch_assoc();
    $e = $row[$element];
    echo $e;
}

function printReferenceInfo($element){
    $result = retrieveReferenceInfo($element);
    $row = $result->fetch_assoc();
    $e = $row[$element];
    echo $e;
}

function printPorfolioInfo($element){
    $result = retrieveCustomInfo($element);
    $row = $result->fetch_assoc();
    $e = $row[$element];
    echo $e;
}

?>